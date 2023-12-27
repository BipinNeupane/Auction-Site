<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function displayDashboard()
    {
        return view('admin.master');
    }

    public function displayProducts()
    {
        // dd('Reached here');
        $products = Products::with('category')->where('is_archived', 0)->get();
        return view('admin.productControl', ['products' => $products]);
    }

    public function displayEditProduct($lot_number)
    {
        $product = Products::findOrFail($lot_number);
        return view('editAuction', ['products' => $product]);
    }

    public function displayAssignCatalog(){
        $product = Products::all();
        $catalog = Catalog::all();
        return view('admin.assignCatalog',['products' => $product, 'catalog' => $catalog]);
    }

    public function assignCatalog(Request $request){
        $request->validate([
            'catalog_id' => 'required|exists:catalogs,catalog_id',
            'product_id' => 'required|exists:products,lot_number',
        ]);
    
        // Find the product based on the provided product_id
        $product = Products::where('lot_number', $request->input('product_id'))->first();
    
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Update the catalog_id
        $product->catalog_id = $request->input('catalog_id');
    
        // Save the changes to the database
        $product->save();
    
        return redirect()->back()->with('success', 'Product assigned to catalog successfully');
    }

    public function viewProduct($lot_number)
    {
        $product = Products::with('category')->findOrFail($lot_number);
        return view('admin.view-auction', ['products' => $product]);
    }

    public function displayCreateCatalog(){
        return view('admin.create-catalog');
    }

    public function displayArchived()
    {
        // dd('Reached here');
        // Retrieve archived products where is_archived is true (1)
        $archivedProducts = Products::where('is_archived', 1)->get();

        // Pass the $archivedProducts variable to your view or perform other actions
        return view('admin.archivedProducts', ['archivedProducts' => $archivedProducts]);
    }

    public function destroyProduct($lot_number)
    {
        // Find the product by ID
        $product = Products::findOrFail($lot_number);

        // Delete the product
        $product->delete();

        // Redirect or return a response
        return redirect()->back();
    }

    public function archiveProduct($lot_number)
    {
        $product = Products::findOrFail($lot_number);
        $product->update(['is_archived' => 1]);
        return redirect()->back();
    }
    public function unarchiveProduct($lot_number)
    {
        $product = Products::findOrFail($lot_number);
        $product->update(['is_archived' => 0]);
        return redirect()->back();
    }
   
    public function saveCatalog(Request $request){

        $request->validate([
            'catalog_title'=>'required|string',
            'start_date' => 'required|date|after_or_equal:' . now()->toDateTimeString(),
            'start_date' => 'required|date|after:startDate',
        ]);

        $catalogTbl = new Catalog();
        $catalogTbl->catalog_title = $request->input('catalog_title');
        $catalogTbl->start_date = $request->input('start_date');
        $catalogTbl->end_date = $request->input('end_date');

        $catalogTbl->save();

        return redirect()->back()->with('success', 'Catalog added successfully');
    

    }
}  
