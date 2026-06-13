<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalStock = Product::sum('stock');

        // Dynamic views formula to simulate realistic data based on actual db counts
        $totalViews = 15320 + ($totalArticles * 124) + ($totalProducts * 82) + ($totalUsers * 45);
        if ($totalViews >= 1000000) {
            $totalViewsFormatted = number_format($totalViews / 1000000, 1) . 'm';
        } elseif ($totalViews >= 1000) {
            $totalViewsFormatted = number_format($totalViews / 1000, 1) . 'k';
        } else {
            $totalViewsFormatted = $totalViews;
        }

        $recentProducts = Product::latest()->take(5)->get();
        $recentArticles = Article::with('author')->latest()->paginate(5);

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalProducts',
            'totalUsers',
            'totalStock',
            'totalViewsFormatted',
            'recentProducts',
            'recentArticles'
        ));
    }

    public function exportReport()
    {
        $totalArticles = Article::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalStock = Product::sum('stock');
        $totalViews = 15320 + ($totalArticles * 124) + ($totalProducts * 82) + ($totalUsers * 45);

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=guitarhero_report_" . date('Y-m-d') . ".csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use ($totalArticles, $totalProducts, $totalUsers, $totalStock, $totalViews) {
            $file = fopen('php://output', 'w');

            // Header info
            fputcsv($file, ['GUITAR HERO ADMIN - DASHBOARD EXPORT REPORT']);
            fputcsv($file, ['Generated Date', date('Y-m-d H:i:s')]);
            fputcsv($file, []);

            // Metrics table
            fputcsv($file, ['OVERVIEW METRICS']);
            fputcsv($file, ['Metric', 'Current Database Value']);
            fputcsv($file, ['Total Articles', $totalArticles]);
            fputcsv($file, ['Total Products', $totalProducts]);
            fputcsv($file, ['Total Users', $totalUsers]);
            fputcsv($file, ['Total Stock (Products)', $totalStock]);
            fputcsv($file, ['Estimated Views', $totalViews]);
            fputcsv($file, []);

            // Articles table
            fputcsv($file, ['LATEST ARTICLES LIST']);
            fputcsv($file, ['ID', 'Title', 'Author', 'Created Date', 'Status']);
            $articles = Article::with('author')->latest()->get();
            foreach ($articles as $art) {
                fputcsv($file, [
                    $art->id,
                    $art->title,
                    $art->author->name,
                    $art->created_at->format('Y-m-d H:i:s'),
                    $art->status
                ]);
            }
            fputcsv($file, []);

            // Products table
            fputcsv($file, ['LATEST PRODUCTS LIST']);
            fputcsv($file, ['ID', 'Name', 'Brand', 'Price', 'Stock']);
            $products = Product::latest()->get();
            foreach ($products as $prod) {
                fputcsv($file, [
                    $prod->id,
                    $prod->name,
                    $prod->brand,
                    $prod->price,
                    $prod->stock
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
