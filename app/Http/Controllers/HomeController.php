<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'author'])
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $products = Product::with(['category'])
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('articles', 'products'));
    }
}
