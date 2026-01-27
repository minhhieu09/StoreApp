<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BillImageModel;
use App\Models\CategoryModel;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
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
        $item = Product::query()
            ->where('id', $id)
            ->with(['category_relation', 'product_variant'])
            ->first();
        $categories = CategoryModel::all();
        return view('admin.product.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id){
        $item = Product::findOrFail($id);
        $data = $request->except(['duration', 'type', 'price', 'sale_price']);

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
// delete product variant
        $existingVariantIds = $item->product_variant()->pluck('id')->toArray();
        $formVariantIds = array_filter($request->variant_id ?? []);

        // DELETE
        $deleteIds = array_diff($existingVariantIds, $formVariantIds);
        if (!empty($deleteIds)) {
            $item->product_variant()->whereIn('id', $deleteIds)->delete();
        }

        foreach ($request->duration as $key => $value) {
            if (!empty($request->variant_id[$key])){
                $item->product_variant()->where('id', $request->variant_id[$key])->update([
                    'duration' => $value,
                    'type' => $request->type[$key],
                    'price' => $request->price[$key],
                    'sale_price' => $request->sale_price[$key] ?? null,
                ]);
            }else{
                $item->product_variant()->create([
                    'duration' => $value,
                    'type' => $request->type[$key],
                    'price' => $request->price[$key],
                    'sale_price' => $request->sale_price[$key] ?? null,
                ]);
            }
        }
        return redirect()->route('adminProduct')->with('success', 'Product created successfully');
    }

    public function delete($id){
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('adminProduct')->with('success', 'Product deleted successfully');
    }

//    Bill Image
    public function bill(){
        $images = BillImageModel::latest()->paginate(20);
        return view('admin.bill.index', compact('images'));
    }
    public function createImage(){
        return view('admin.bill.create');
    }

//    Save images
    public function storeImage(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('images', $filename, 'public');

            // Lưu vào database
            BillImageModel::create([
                'path' => $path,
                'filename' => $filename,
            ]);
            return redirect()->route('bill')->with('success', 'Image created successfully');

        }
        return back()->with('error', 'Image upload failed');
    }

    public function deleteImage(BillImageModel $image){
        if ($image->path && Storage::disk('public')->exists($image->path)){
            Storage::disk('public')->delete($image->path);
        }

        //Delete Image
        $image->delete();
        return redirect()->route('bill')->with('success', 'Image deleted successfully');
    }

}
