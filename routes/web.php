<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/category',[CategoryController::class,'index']);
Route::get('/detail-bill',[BillController::class,'detailBill']);
Route::get('/product',[ProductController::class,'product']);

/*Dashboard*/
Route::get('/dashboard',[DashboardController::class,'dashBoard']);
