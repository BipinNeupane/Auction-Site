<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Products;
use App\Models\Bids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'startDate' => 'required|date|after_or_equal:' . now()->toDateTimeString(),
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

    public function editProduct(Request $request,$lot_number){
        $request->validate([
            'product_name' => 'required|string',
            'artist' => 'required|string',
            'category' => 'required|integer',
            'year_produced' => 'required|date|before:startDate',
            'subject_classification' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'year_produced' => 'required|date',
            'startDate' => 'required|date|after_or_equal:' . now()->toDateTimeString(),
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



        $auction = Products::findorFail($lot_number);
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
        }else{

        }
      
        
        $auction->type = request()->input('type');
    
        $auction->save();
        return redirect(route('display-dashboard'))->with('success', 'Product edited successfully');
    }

  
   public function getHighestBid($lot_number){

        $lastBidAmount = Bids::where('lot_number', $lot_number)
        ->orderBy('bid_amount', 'desc')->first();
    
        if ($lastBidAmount) {
            return $lastBidAmount->bid_amount;
        } else {
            return 0;
        }
    }


    public function storeBidAuction(Request $request, $lot_number)
    {
        if(Auth::check()){
        $highestBid = $this->getHighestBid($lot_number);
    
        $request->validate([
            'bid_amount' => 'required|numeric|gt:' . $highestBid,
        ], [
            'bid_amount.gt' => 'Your bid must be higher than the last bid.',
        ]);
    
        // Check if the bid amount is not greater than the highest bid
        if ($request->input('bid_amount') <= $highestBid) {
            return redirect()->back()->withErrors(['bid_amount' => 'Your bid must be higher than the last bid.'])->withInput();
        }
    
        // First, insert the bid into the bids table
        $bid = new Bids();
        $bid->lot_number = $lot_number;
        $bid->bid_amount = $request->input('bid_amount');
        $bid->bid_user = 1; 
        $bid->save();
    
        // Return a response or perform additional actions as needed
        return redirect()->back()->with('success', 'Bid placed successfully.');
    }
    else{
        return redirect('/login-user')->with('success','Please login before bidding.');
    }
    }



}
