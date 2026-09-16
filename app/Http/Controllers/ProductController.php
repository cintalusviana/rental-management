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
            $imageName = time() . '.' . $request->file('image')->extension();

            $uploadPath = public_path('uploads/products');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $request->file('image')->move(
                $uploadPath,
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

        $imageName = $product->image;

        if ($request->hasFile('image')) {
            $uploadPath = public_path('uploads/products');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Hapus gambar lama jika tersedia
            if ($product->image) {
                $oldImagePath = $uploadPath . '/' . $product->image;

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->file('image')->extension();

            $request->file('image')->move(
                $uploadPath,
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
        if ($product->image) {
            $imagePath = public_path(
                'uploads/products/' . $product->image
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}