<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        Category::create([
            'category' => $request->category
        ]);

        return redirect('/category')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'category' => $request->category
        ]);

        return redirect('/category')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('/category')
            ->with('success', 'Data berhasil dihapus');
    }
}