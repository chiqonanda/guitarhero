<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlists()->with(['product.category'])->latest()->get();

        return view('wishlist.index', compact('wishlists'));
    }

    public function toggle($productId)
    {
        $product = Product::findOrFail($productId);
        $userId = auth()->id();

        $existing = Wishlist::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $message = 'Guitar removed from your wishlist.';
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $product->id,
            ]);
            $message = 'Guitar added to your wishlist.';
        }

        return redirect()->back()->with('success', $message);
    }
}
