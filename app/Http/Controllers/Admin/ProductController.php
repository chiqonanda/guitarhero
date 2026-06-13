<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::whereIn('slug', ['electric-guitar', 'acoustic-guitar', 'bass'])->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Guitar created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::whereIn('slug', ['electric-guitar', 'acoustic-guitar', 'bass'])->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($product->image && !Str::contains($product->image, 'product')) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Guitar updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && !Str::contains($product->image, 'product')) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Guitar deleted successfully.');
    }
}
