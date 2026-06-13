<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['category', 'author']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $articles = $query->latest()->paginate(10)->withQueryString();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::whereIn('slug', ['news', 'review'])->get();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::whereIn('slug', ['news', 'review'])->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($article->image && !Str::contains($article->image, 'article')) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image && !Str::contains($article->image, 'article')) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}
