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
        $item = Product::findOrFail($id);
        return view('category', compact('item'));
    }
}
