<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuctionController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Products::latest('created_at')->take(8)->get();
    return view('index', ['products' => $products]);
});







Route::get('/dynamicForm', function () {
    return view('dynamicForm');
}); 

Route::get('/test', function () {
    return view('test');
});

Route::get('/addAuction', function () {
    return view('addAuction');
});

Route::post('/addAuction',[AuctionController::class, 'postProduct'])->name('posty');

Route::post('students', [StudentController::class, 'store'])->name('save-student');

Route::get('/admin/dashboard', [AdminController::class,'displayDashboard'] );
Route::get('/admin/products', [AdminController::class,'displayProducts'] )->name('display-products');