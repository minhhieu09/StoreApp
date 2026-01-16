<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class DashboardController extends Controller
{
    //
    public function adminProduct(Request $request)
    {
        $product = Product::query()
            ->with(['category_relation', 'product_variant'])
            ->withMin('product_variant', 'sale_price' )
            ->withMax('product_variant', 'sale_price')
            ->withMin('product_variant', 'price')
            ->withMax('product_variant', 'price')
            ->search($request->search)
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->status($request->status)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $categories = CategoryModel::all();
        return view('admin.product.index', compact('product', 'categories'));
    }

    public function create(){
        $categories = CategoryModel::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->except(['duration', 'type', 'price', 'sale_price']);
        $path = $request->file('image')->store('products', 'public');
        $validated['image'] = $path;
        $validated['category_id'] = $request->category_id;

        $data = Product::create($validated);

        foreach ($request->duration as $key => $value) {
            $data->product_variant()->create([
                'duration' => $value,
                'type' =>  $request->type[$key],
                'price' =>  $request->price[$key],
                'sale_price' =>  $request->sale_price[$key] ?? null,
            ]);
        }


        return redirect()->route('adminProduct')->with('success', 'Product created successfully');
    }

    public function edit($id){
        $item = Product::findOrFail($id);
        return view('admin.product.edit', compact('item'));
    }

    public function update(Request $request, $id){
        $item = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('new_images')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }

            // Upload ảnh mới
            $path = $request->file('new_images')->store('products', 'public');
            $data['image'] = $path;
        }

        $item->update($data);
        return redirect()->route('adminProduct')->with('success', 'Product created successfully');
    }

    public function delete($id){
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('adminProduct')->with('success', 'Product deleted successfully');
    }

}
