<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function fetchProducts(int $condition): \Illuminate\Database\Query\Builder
    {
        return DB::table('products')
            ->where('features', '=', $condition)
            ->orderBy('position');
    }

    public function index(): Factory|View|Application
    {
        $featuredProducts = $this->fetchProducts(1)->get();
        $products = $this->fetchProducts(0)->get();

        return view('index.index', compact('featuredProducts', 'products'));
    }

    public function showProduct($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        return view('product.product', compact('product'));
    }
}
