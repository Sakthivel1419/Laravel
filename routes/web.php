<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Customers
Route::get('/company',[CompanyController::class, 'index']);

Route::post('/store',[CompanyController::class, 'store']);

//Users
Route::get('/users',[UserController::class, 'index']);

Route::post('/user_store',[UserController::class, 'store']);

// Products
Route::get('/products',[ProductController::class,'index']);

Route::post('/product_store',[ProductController::class,'store']);

Route::get('/product.edit/{id}',[ProductController::class,'edit'])->name('product.edit');

Route::post('/product.update/{id}',[ProductController::class,'update'])->name('product.update');


//Mapping
Route::get('/mapping',[MapController::class, 'index'])->name('mapping');

Route::post('/mapping_store',[MapController::class,'store'])->name('mapping_store');

//dasboard
Route::get('/dashboard',[DashboardController::class, 'index']);