<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->get();

        $categories = Category::all();

        return view('products.index', compact(
            'products',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|max:255',
            'description'   => 'nullable',
            'price_per_day' => 'required|numeric',
            'stock'         => 'required|integer|min:0',
            'status'        => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                base_path('../../public_html/uploads/products'),
                $imageName
            );
        }

        Product::create([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'description'   => $request->description,
            'price_per_day' => $request->price_per_day,
            'stock'         => $request->stock,
            'status'        => $request->status,
            'image'         => $imageName,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact(
            'product',
            'categories'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|max:255',
            'description'   => 'nullable',
            'price_per_day' => 'required|numeric',
            'stock'         => 'required|integer|min:0',
            'status'        => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gambar lama tetap dipakai
        $imageName = $product->image;

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                base_path('../../public_html/uploads/products'),
                $imageName
            );
        }

        $product->update([
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'description'   => $request->description,
            'price_per_day' => $request->price_per_day,
            'stock'         => $request->stock,
            'status'        => $request->status,
            'image'         => $imageName,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar jika ada
        if ($product->image) {

            $path = base_path(
                '../../public_html/uploads/products/' . $product->image
            );

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}