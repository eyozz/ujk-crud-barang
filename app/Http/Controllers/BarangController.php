<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Barang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function barang()
    {
        $barang = Barang::with('kategori')->get();

        return Inertia::render('Barang', [
            'barangs' => $barang,
            'user' => auth()->user(),
        ]);
    }

    public function tambahbarang()
    {
        $kategori = Kategori::all();

        return Inertia::render('Barang/TambahBarang', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga' => 'required|integer',
            'stok_barang' => 'required|integer',
            'id_kategori' => 'nullable|integer',
        ]);

        Barang::create($validated);
        return Redirect::route('barang.index');
    }

    public function editbarang($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        $kategori = Kategori::all();

        return Inertia::render('Barang/EditBarang', [
            'barang' => $barang,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga' => 'required|integer',
            'stok_barang' => 'required|integer',
            'id_kategori' => 'nullable|integer',
        ]);

        $barang->update($validated);
        return Redirect::route('barang.index');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return Redirect::route('barang.index');
    }
}