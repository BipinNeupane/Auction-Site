<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function displayDashboard(){
        return view('admin.master');
    }

    public function displayProducts(){
        $products = Products::with('category')->get();
        return view('admin.productControl', ['products' => $products]);
    }
}
