<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['category', 'author'])->orderBy('published_at', 'desc');

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by category slug
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $articles = $query->paginate(6)->withQueryString();
        $categories = Category::whereIn('slug', ['news', 'review'])->get();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::with(['category', 'author'])->where('slug', $slug)->firstOrFail();

        $relatedArticles = Article::with(['category', 'author'])
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
