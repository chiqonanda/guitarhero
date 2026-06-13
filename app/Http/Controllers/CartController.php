<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->firstOrCreate(['user_id' => auth()->id()]);
        
        $items = $cart->items()->with(['product.category'])->get();
        
        $total = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('items', 'total'));
    }

    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock.');
        }

        $cart = auth()->user()->cart()->firstOrCreate(['user_id' => auth()->id()]);

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            if ($item->quantity + 1 > $product->stock) {
                return redirect()->back()->with('error', 'Cannot add more. Not enough stock available.');
            }
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Guitar added to your cart.');
    }

    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = auth()->user()->cart;
        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $item = $cart->items()->findOrFail($itemId);
        $product = $item->product;

        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', "Cannot set quantity. Only {$product->stock} items in stock.");
        }

        $item->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function destroy($itemId)
    {
        $cart = auth()->user()->cart;
        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $item = $cart->items()->findOrFail($itemId);
        $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
