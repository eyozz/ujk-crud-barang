<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Barang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barang()
    {
        $barang = Barang::all();
        return Inertia::render('Barang', [
            'barangs' => $barang,
            'user' => auth()->user(),
        ]);
    }

    public function tambahbarang()
    {
        return Inertia::render('Barang/TambahBarang');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga' => 'required|integer',
            'stok_barang' => 'required|integer',
        ]);

        Barang::create($validated);
        return Redirect::route('barang.index');
    }

    public function editbarang($id)
    {
        $barang = Barang::findOrFail($id);
        return Inertia::render('Barang/EditBarang', [
            'barang' => $barang
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string',
            'harga' => 'required|integer',
            'stok_barang' => 'required|integer',
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