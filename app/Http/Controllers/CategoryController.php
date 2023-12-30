<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Products;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }


    public function displayProductsofCategory($category_id) {
        $category = Category::find($category_id); // Assuming you have a Category model
        $products = Products::where('category_id', $category_id)->with('category')->get();
        return view('category', ['products' => $products, 'category' => $category]);
    
    }

}
?>