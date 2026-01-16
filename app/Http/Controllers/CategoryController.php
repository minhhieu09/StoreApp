<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function productDetail($id)
    {
        $item = Product::query()
            ->where('id', $id)
            ->with(['category_relation', 'product_variant'])
            ->withMin('product_variant', 'sale_price' )
            ->withMax('product_variant', 'sale_price')
            ->withMin('product_variant', 'price')
            ->withMax('product_variant', 'price')
        ->first();

        return view('category', compact('item'));
    }
}
