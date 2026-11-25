<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProdukController extends Controller
{
    // READ: Menampilkan semua produk
    public function index(): JsonResponse
    {
        $produks = Produk::all();

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil diambil.',
            'data' => $produks
        ], 200);
    }

    // READ: Menampilkan detail produk
    public function show($id): JsonResponse
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail produk berhasil diambil.',
            'data' => $produk
        ], 200);
    }

    // CREATE: Menambahkan produk
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:100',
            'berat' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan.',
            'data' => $produk
        ], 201);
    }

    // UPDATE: Mengubah produk
    public function update(Request $request, $id): JsonResponse
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:100',
            'berat' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui.',
            'data' => $produk
        ], 200);
    }

    // DELETE: Menghapus produk
    public function destroy($id): JsonResponse
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus.'
        ], 200);
    }
}
