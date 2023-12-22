<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Products;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function postProduct(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product_name' => 'required|string',
            'artist' => 'required|string',
            'category' => 'required|integer',
            'year_produced' => 'required|date|before:startDate',
            'subject_classification' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'year_produced' => 'required|date',
            'startDate' => 'required|date|after_or_equal:' . now()->toDateString(),
            'endDate' => 'required|date|after:startDate',
            'estimated_price' => 'required|numeric|min:0',
        ]);

        
        // dynamic validation
    $category = $request->input('category');

    // Validate category-specific fields based on the selected category
    switch ($category) {
        case 1: // Drawing category
            $request->validate([
                'height' => 'required|integer|min:0',
                'length' => 'required|integer|min:0',
                'is_framed' => 'sometimes|boolean',
                'material_used' => 'required|string',
            ]);
            break;

        case 2: // Painting category
            $request->validate([
                'material_used' => 'required|string',
                'height' => 'required|integer|min:0',
                'length' => 'required|integer|min:0',
                'is_framed' => 'sometimes|boolean', 
            ]);
            break;

        case 3: // Photograph category
            $request->validate([
                'type' => 'required|in:Black and White,Color',
                'height' => 'required|integer|min:0',
                'length' => 'required|integer|min:0',
            ]);
            break;

        case 4: // Sculpture category
            $request->validate([
                'material_used' => 'required|string',
                'height' => 'required|integer|min:0',
                'length' => 'required|integer|min:0',
                'width' => 'required|integer|min:0',
                'weight' => 'required|integer|min:0',
            ]);
            break;

        case 5: // Carvings category
            $request->validate([
                'material_used' => 'required|string',
                'height' => 'required|integer|min:0',
                'length' => 'required|integer|min:0',
                'width' => 'required|integer|min:0',
                'weight' => 'required|integer|min:0',
            ]);
            break;

        // Add cases for other categories

        default:
            // Handle unknown category
            break;
    }



        $auction = new Products();
        $auction->product_name = request()->input('product_name');
        $auction->artist = request()->input('artist');
        $auction->category_id = request()->input('category');
        $auction->year_produced = request()->input('year_produced');
        $auction->subject_classification = request()->input('subject_classification');
        $auction->description = request()->input('description');
        $auction->start_date = request()->input('startDate');
        $auction->end_date = request()->input('endDate');
        $auction->estimated_price = request()->input('estimated_price');
        $auction->material_used = request()->input('material_used');
        if (request()->has('is_framed')) {
            $auction->is_framed = request()->input('is_framed');
            // Handle the checked case
        } else {
            // Handle the unchecked case
        }
        $auction->height = request()->input('height');
        $auction->length = request()->input('length');
        $auction->width = request()->input('width');
        $auction->weight = request()->input('weight');
    
        if(request()->hasfile('image'))
        {
            try {
                $file = $request->file('image');
                // ...
            } catch (\Exception $e) {
                // ...
            }
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $auction->image = $filename;
        }
      
        
        $auction->type = request()->input('type');
    
        $auction->save();
        return redirect('/')->with('success', 'Product added successfully');
    }
}
