<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InviteMailController;
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

// Invite mail
Route::get('/invite/{id}',[InviteMailController::class,'inviteMail']);


//Customers
Route::get('/company',[CompanyController::class, 'index']);

Route::post('/store',[CompanyController::class, 'store']);

Route::get('/company/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');

Route::post('/company/update/{id}',[CompanyController::class,'update'])->name('company.update');

Route::delete('/company/delete/{id}',[CompanyController::class,'delete'])->name('company.delete');

Route::get('/company/restore/{id}',[CompanyController::class, 'restore']);



//Users
Route::get('/users',[UserController::class, 'index']);

Route::post('/user_store',[UserController::class, 'store']);

// Route::get('/user.edit/{id}',[UserController::class,'edit'])->name('user.edit');

Route::delete('/user/delete/{id}',[UserController::class, 'delete'])->name('user.delete');

Route::get('/user/restore/{id}',[UserController::class,'restore']);


// Products
Route::get('/products',[ProductController::class,'index']);

Route::post('/product_store',[ProductController::class,'store']);

Route::get('/product.edit/{id}',[ProductController::class,'edit'])->name('product.edit');

Route::post('/product.update/{id}',[ProductController::class,'update'])->name('product.update');

Route::delete('/product.delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/restore/{id}',[ProductController::class, 'restore']);


//Mapping
Route::get('/mapping',[MapController::class, 'index'])->name('mapping');

Route::post('/mapping_store',[MapController::class,'store'])->name('mapping_store');

//dasboard
Route::get('/dashboard',[DashboardController::class, 'index']);