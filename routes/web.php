<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*Product*/
Route::get('/', function () {
    return view('home');
});

Route::get('/category',[CategoryController::class,'index']);
Route::get('/detail-bill',[BillController::class,'detailBill']);
Route::get('/product',[ProductController::class,'product'])->name('product');
Route::get('/product-detail/{id}',[CategoryController::class,'productDetail'])->name('product.detail');


/*==============================================
  ADMIN ROUTES
==============================================*/
Route::prefix('admin')->group(function () {

    /*----------------------------------------------
      Admin Login Routes (Guest - chưa đăng nhập)
    ----------------------------------------------*/
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    });

    /*----------------------------------------------
      Admin Protected Routes (Đã đăng nhập)
    ----------------------------------------------*/
    Route::middleware('admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout.submit');

        // Dashboard & Products - GIỮ NGUYÊN NAME
        Route::get('/admin-product', [DashboardController::class, 'adminProduct'])->name('adminProduct');
        Route::get('/create', [DashboardController::class, 'create'])->name('createProduct');
        Route::post('/store', [DashboardController::class, 'store'])->name('storeProduct');
        Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('editProduct');
        Route::post('/update/{id}', [DashboardController::class, 'update'])->name('updateProduct');
        Route::get('/delete/{id}', [DashboardController::class, 'delete'])->name('deleteProduct');
    });
});
