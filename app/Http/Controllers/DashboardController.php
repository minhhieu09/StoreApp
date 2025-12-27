<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashBoard(Request $request)
    {
        $product = Product::query()
            ->search($request->search)
            ->category($request->category)
            ->status($request->status)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard', compact('product'));
    }

    public function create(){

    }


}
