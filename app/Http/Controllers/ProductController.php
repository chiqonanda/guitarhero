<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category'])->latest();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category slug
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->paginate(8)->withQueryString();
        
        // Product categories only
        $categories = Category::whereIn('slug', ['electric-guitar', 'acoustic-guitar', 'bass'])->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::with(['category'])->where('slug', $slug)->firstOrFail();

        $isInWishlist = false;
        if (auth()->check()) {
            $isInWishlist = auth()->user()->wishlists()->where('product_id', $product->id)->exists();
        }

        // related products: same category, excluding current
        $relatedProducts = Product::with(['category'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'isInWishlist', 'relatedProducts'));
    }
}
