<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'category_name' => 'required|min:3',
        ]);

        // Masukin data ke database
        // Cara Pertama
        // $category = new Category();
        // $category->title = $request->title;
        // $category->save();

        // Cara Kedua
        Category::create([
            'category_name' => $request->title,
        ]);

        // Redirect ke halaman categories
        return redirect('/categories')->with('success_msg', 'Kategori berhasil dibuat');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validasi
        $request->validate([
            'category_name' => 'required|min:3',
        ]);

        // Update data
        $category->update([
            'category_name' => $request->title,
        ]);

        // Redirect ke halaman categories
        return redirect('/categories')->with('success_msg', 'Kategori berhasil diubah');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories')->with('success_msg', 'Kategori berhasil dihapus');
    }
}
