<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private function getProducts()
    {
        return Product::query()
            ->with(['category_relation', 'product_variant'])
            ->withMin('product_variant', 'sale_price')
            ->withMax('product_variant', 'sale_price')
            ->withMin('product_variant', 'price')
            ->withMax('product_variant', 'price')
            ->get()
            ->groupBy('category_id');
    }

    public function product(){
        return view('product', ['products' => $this->getProducts()]);
    }

    public function home(){
        $groupedProducts = $this->getProducts();
        $bestSellerProducts = ($groupedProducts[1] ?? collect())->take(3);
        $newestProducts     = ($groupedProducts[2] ?? collect())->take(3);

        return view('home', compact(
            'bestSellerProducts',
            'newestProducts'
        ));
    }

}
