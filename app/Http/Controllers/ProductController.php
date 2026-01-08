<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function product(Request $request){
        $products = Product::all();
        return view('product', ['products' => $products]);
    }
}
