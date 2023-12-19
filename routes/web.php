<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    return view('index');
});


Route::get('/addAuction', function () {
    return view('addAuction');
});


use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'createForm'])->name('form.create');

Route::get('/dynamicForm', function () {
    return view('dynamicForm');
});
Route::get('/test', function () {
    return view('test');
});
