<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'home'])->name('home');

Route::post('login',[App\Http\Controllers\auth\LoginController::class,'login'])->name('login');
Route::get('logout',[App\Http\Controllers\auth\LoginController::class,'logout'])->name('logout');
Route::post('register',[App\Http\Controllers\auth\RegisterController::class,'register'])->name('register');

Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::resource('logos',LogoController::class);
Route::resource('colors',ColorController::class);
Route::resource('sizes',SizeController::class);

Route::get('/dashboard',function(){
    return view('components/admin/dashboard');
})->name('admindashboard');
Route::post('/add-to-cart',[App\Http\Controllers\CartController::class,'add_to_cart'])->name('addtocart');
Route::get('add-to-cart',[App\Http\Controllers\CartController::class,'index'])->name('cartpage');
Route::get('productDetails/{slug}',[HomeController::class,'productDetails'])->name('productDetails');
