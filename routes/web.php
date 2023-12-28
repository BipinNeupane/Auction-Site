<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuctionController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use Faker\Guesser\Name;

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
})->name('/');

Route::get('/dynamicForm', function () {
    return view('dynamicForm');
}); 

Route::get('/bid-auction/{lot_number}',[IndexController::class,'showBidAuction'])->name('bid-auction');
Route::match(['get','post'],'/bidded-auction/{lot_number}',[AuctionController::class,'storeBidAuction'])->name('post-auction');

Route::get('/test', function () {
    return view('test');
});

Route::get('/addAuction', function () {
    return view('addAuction');
});

Route::post('/addAuction',[AuctionController::class, 'postProduct'])->name('posty');

Route::post('students', [StudentController::class, 'store'])->name('save-student');

Route::get('/admin/dashboard', [AdminController::class,'displayDashboard'] )->name('display-dashboard');;
Route::get('/admin/products/manage', [AdminController::class,'displayProducts'] )->name('display-products');
Route::get('/admin/archive-products/{lot_number}', [AdminController::class,'archiveProduct'] )->name('archive-product');
Route::get('/admin/products/{lot_number}', [AdminController::class,'unarchiveProduct'] )->name('unarchive-product');
Route::get('/admin/archived-products', [AdminController::class,'displayArchived'] )->name('display-archived-products');
Route::delete('/admin/products/{lot_number}', [AdminController::class,'destroyProduct'] )->name('destroy-product');
Route::get('/admin/edit-products/{lot_number}', [AdminController::class,'displayEditProduct'] )->name('display-edit-product');
Route::get('/admin/view-product/{lot_number}', [AdminController::class,'viewProduct'] )->name('view-product');
Route::match(['get', 'post'], '/admin/edit-auction/{lot_number}', [AuctionController::class,'editProduct'] )->name('edit-product');
Route::get('admin/create-catalog',[AdminController::class,'displayCreateCatalog'])->name('create-catalog');
Route::post('admin/create-catalog',[AdminController::class,'saveCatalog'])->name('save-catalog');
Route::get('admin/assign-catalog',[AdminController::class,'displayAssignCatalog'])->name('display-assign-catalog');
Route::post('admin/assign-catalog',[AdminController::class,'assignCatalog'])->name('assign-catalog');


