<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Models\Catalog;
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
    $catalog = Catalog::latest('start_date')->get();
    return view('index', ['products' => $products,'catalogs' => $catalog]);
})->name('/');

Route::get('/category/{category_id}', [CategoryController::class,'displayProductsofCategory'])->name('category-page');

Route::get('/dynamicForm', function () {
    return view('dynamicForm');
}); 

Route::get('/login', function () {
    return view('login');
}); 

Route::get('/catalog/{catalog_id}',[IndexController::class,'showCatalog'])->name('display-catalog-auction');

Route::get('/bid-auction/{lot_number}',[IndexController::class,'showBidAuction'])->name('bid-auction');
Route::match(['get','post'],'/bidded-auction/{lot_number}',[AuctionController::class,'storeBidAuction'])->name('post-auction');

Route::get('/test', function () {
    return view('test');
});

Route::get('/addAuction', function () {
    return view('addAuction');
});

Route::post('/addAuction',[AuctionController::class, 'postProduct'])->name('posty');


    
Route::middleware(['isAdmin'])->prefix('admin')->group(function () {
    
        Route::get('/dashboard', [AdminController::class, 'displayDashboard'])->name('display-dashboard');
    
        Route::get('/products/manage', [AdminController::class, 'displayProducts'])->name('display-products');
        Route::get('/archive-products/{lot_number}', [AdminController::class, 'archiveProduct'])->name('archive-product');
        Route::get('/products/{lot_number}', [AdminController::class, 'unarchiveProduct'])->name('unarchive-product');
        Route::get('/archived-products', [AdminController::class, 'displayArchived'])->name('display-archived-products');
        Route::delete('/products/{lot_number}', [AdminController::class, 'destroyProduct'])->name('destroy-product');
        Route::get('/edit-products/{lot_number}', [AdminController::class, 'displayEditProduct'])->name('display-edit-product');
        Route::get('/view-product/{lot_number}', [AdminController::class, 'viewProduct'])->name('view-product');
        Route::match(['get', 'post'], '/edit-auction/{lot_number}', [AuctionController::class, 'editProduct'])->name('edit-product');
        Route::get('/create-catalog', [AdminController::class, 'displayCreateCatalog'])->name('create-catalog');
        Route::post('/create-catalog', [AdminController::class, 'saveCatalog'])->name('save-catalog');
        Route::get('/assign-catalog', [AdminController::class, 'displayAssignCatalog'])->name('display-assign-catalog');
        Route::post('/assign-catalog', [AdminController::class, 'assignCatalog'])->name('assign-catalog');
        Route::get('/display-clients/{role}', [AdminController::class, 'displayClients'])->name('display-clients');
        Route::get('/view-client/{id}', [AdminController::class, 'viewClients'])->name('view-client');
        Route::get('/edit-client/{id}', [AdminController::class, 'displayEditClient'])->name('display-edit-client');
        Route::put('/update-user/{id}', [AdminController::class,'updateUser'])->name('update-client');
        Route::delete('/delete-user/{id}', [AdminController::class, 'destroyUser'])->name('destroy-user');
    });


// Search functionality
Route::post('/search',[IndexController::class,'search'])->name('search-products');  
Route::post('/search-filter',[IndexController::class,'filterSearch'])->name('filter-search');  

Route::get('/login-user',[AuthController::class,'loadLogin'])->name('load-login');
Route::get('/register',[AuthController::class,'loadRegister'])->name('load-register');
Route::post('/register',[AuthController::class,'register'])->name('register-user');
Route::post('/login',[AuthController::class,'login'])->name('login-user');
Route::get('/login',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[AuthController::class,'toDashboard'])->name('to-dashboard');