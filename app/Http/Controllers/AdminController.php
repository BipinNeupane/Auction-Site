<?php

namespace App\Http\Controllers;

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



}
