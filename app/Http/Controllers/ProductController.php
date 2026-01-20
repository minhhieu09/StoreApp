<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function product(Request $request){
        $products = Product::query()
            ->with(['category_relation', 'product_variant'])
            ->withMin('product_variant', 'sale_price' )
            ->withMax('product_variant', 'sale_price')
            ->withMin('product_variant', 'price')
            ->withMax('product_variant', 'price')
        ->get()
        ->groupBy('category_relation');
        return view('product', ['products' => $products]);
    }
}
