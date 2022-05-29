<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        // if (Auth::user()->role == 'Member') {
        //     $blogs = Blog::where('user_id', Auth::user()->id)->get();
        // } else {
        //     $blogs = Blog::all();
        // }

        $items = Auth::user()->role == 'Member' ? Item::where('user_id', Auth::user()->id)->get() : Item::all();
        $categories = Category::all();
        return view('items.index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'category' => 'required',
            'itemname' => 'required|min:3',
            'item_price' => 'required',
            'item_amount' => 'required',
            'photo' => 'required',
        ]);

        // File Processing
        $files = $request->file('photo');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $photo = $fileName . '-' . date('YmdHis') . '-' . Str::random(10) . '.' . $extension;
        $files->storeAs('public/items/', $photo);

        // Create Item
        Item::create([
            'category_id' => $request->category,
            'itemname' => $request->itemname,
            'item_price' => $request->item_price,
            'item_amount' => $request->item_amount,
            'photo' => $photo,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/items')->with('success_msg', 'Item berhasil ditambah');
    }

    public function edit($id)
    {
        $items = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Jika tidak ada gambar
        if ($request->file('photo') == null) {
            $request->validate([
                'category' => 'required',
                'itemname' => 'required|min:3',
                'item_price' => 'required',
                'item_amount' => 'required',
            ]);

            // Update Item
            $items = Item::findOrFail($id);
            $items->update([
                'category_id' => $request->category,
                'itemname' => $request->content,
                'item_price' => $request->item_price,
                'item_amount' => $request->item_amount
            ]);

            return redirect('/items')->with('success_msg', 'Item berhasil diubah');
        } else {
            // Validasi
            $request->validate([
                'category' => 'required',
                'itemname' => 'required|min:3',
                'item_price' => 'required',
                'item_amount' => 'required',
                'photo' => 'required',
            ]);

            // File Processing
            $files = $request->file('photo');
            $fullFileName = $files->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $files->getClientOriginalExtension();
            $photo = $fileName . '-' . date('YmdHis') . '-' . Str::random(10) . '.' . $extension;
            $files->storeAs('public/items/', $photo);

            // Update Item
            $items = Item::findOrFail($id);
            if (Storage::exists('public/items/' . $items->photo)) {
                Storage::delete('public/items/' . $items->photo);
            }

            $items->update([
                'category_id' => $request->category,
                'itemname' => $request->content,
                'item_price' => $request->item_price,
                'item_amount' => $request->item_amount,
                'photo' => $request->photo
            ]);

            return redirect('/items')->with('success_msg', 'Item berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        if (Storage::exists('public/items/' . $items->photo)) {
            Storage::delete('public/items/' . $items->photo);
        }
        $items->delete();

        return redirect('/items')->with('success_msg', 'Item berhasil dihapus');
    }
}
