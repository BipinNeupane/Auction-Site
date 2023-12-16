<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }
}
?>