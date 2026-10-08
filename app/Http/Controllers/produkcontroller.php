<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class produkcontroller extends Controller
{
    public function index()
    {
        $produk = produk::latest()->get();
        return view('index', compact('produk')); // Memanggil resources/views/index.blade.php
    }

    public function create()
    {
        return view('create'); // Memanggil resources/views/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'price' => 'required|numeric',
        ]);

        produk::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(produk $produk)
    {
        return view('edit', compact('produk')); // Memanggil resources/views/edit.blade.php
    }

    public function update(Request $request, produk $produk)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'price' => 'required|numeric',
        ]);

        $produk->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(produk $produk)
    {
        $produk->delete();
        return redirect()->route('index')->with('success', 'Data berhasil dihapus!');
    }
}