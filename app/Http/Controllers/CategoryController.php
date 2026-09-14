<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

        public function edit(string $id)
    {
        return redirect()->route('categories.index');
    }

        public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|max:100',
            'description'=>'nullable'
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil dihapus.');
    }
}