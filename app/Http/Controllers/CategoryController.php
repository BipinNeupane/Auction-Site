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
        $products = Products::where('category_id', $category_id)->get();
        return view('category', ['products' => $products]);
    }

}
?>