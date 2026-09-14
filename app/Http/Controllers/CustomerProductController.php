<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class CustomerProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->get();

        $categories = Category::all();

        return view('pelanggan.products', compact(
            'products',
            'categories'
        ));
    }

    public function show(Product $product)
    {
        $product->load('category');

        return view('pelanggan.product-detail', compact('product'));
    }
}