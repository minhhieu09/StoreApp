<?php

use App\Http\Controllers\AdminController;
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

/*Admin Login*/
Route::get('/login', [AdminController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/login', [AdminController::class, 'login'])
    ->name('admin.login.submit');

/*Dashboard*/
Route::get('/admin-product',[DashboardController::class,'adminProduct'])->name('adminProduct');
Route::get('/create',[DashboardController::class,'create'])->name('createProduct');
Route::post('/store',[DashboardController::class,'store'])->name('storeProduct');
Route::get('/edit/{id}',[DashboardController::class,'edit'])->name('editProduct');
Route::post('/update/{id}',[DashboardController::class,'update'])->name('updateProduct');
Route::get('/delete/{id}',[DashboardController::class,'delete'])->name('deleteProduct');
