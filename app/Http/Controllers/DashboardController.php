<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function adminProduct(Request $request)
    {
        $product = Product::query()
            ->search($request->search)
            ->category($request->category)
            ->status($request->status)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.product.index', compact('product'));
    }

    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request){
        $validated = $request->all();
        Product::create($validated);

        return redirect()->route('adminProduct')->with('success', 'Product created successfully');
    }

    public function edit($id){
        $item = Product::findOrFail($id);
        return view('admin.product.edit', compact('item'));
    }

    public function update(Request $request, $id){
        $item = Product::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        return redirect()->route('adminProduct')->with('success', 'Product created successfully');
    }

    public function delete($id){
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('adminProduct')->with('success', 'Product deleted successfully');
    }

}
