<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\App;
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

Route::get('/',[App::class,'main']);
Route::get('/products',[App::class,'products']);
Route::get('/product/{id}',[App::class,'product']);
Route::get('/category/{id}',[App::class,'category']);
Route::post('/addcomment',[App::class,'addcomment'])->name('addcomment');
Route::post('/buyproduct',[App::class,'buyproduct'])->name('buyproduct');
Route::get('/search',[App::class,'search']);
Route::prefix('admin')->group(function () {
    Route::get('/',[Admin::class,'main']);
    Route::get('/category',[Admin::class,'category']);
    Route::post('/addcategory',[Admin::class,'addcategory'])->name('addcategory');
    Route::get('/deletecategory',[Admin::class,'deletecategory'])->name('deletecategory');
    Route::get('/product',[Admin::class,'product']);
    Route::post('/addproduct',[Admin::class,'addproduct'])->name('addproduct');
    Route::post('/editproduct',[Admin::class,'editproduct'])->name('editproduct');
    Route::post('/editcategory',[Admin::class,'editcategory'])->name('editcategory');
    Route::get('/purchase',[Admin::class,'purchase']);
});