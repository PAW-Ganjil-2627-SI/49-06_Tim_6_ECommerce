<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelangganResource;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // GET: Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::orderBy('id', 'asc')->get();

        return PelangganResource::collection($pelanggans);
    }

    // POST: Menambahkan data pelanggan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'telepon' => 'required|string|max:20',
            'tipe_alamat' => 'required|in:Rumah,Kos',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
        ]);

        $pelanggan = Pelanggan::create($validated);

        return (new PelangganResource($pelanggan))
            ->response()
            ->setStatusCode(201);
    }

    // GET: Menampilkan satu pelanggan berdasarkan ID
    public function show(Pelanggan $pelanggan)
    {
        return new PelangganResource($pelanggan);
    }

    // PUT: Memperbarui data pelanggan
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
            'telepon' => 'required|string|max:20',
            'tipe_alamat' => 'required|in:Rumah,Kos',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
        ]);

        $pelanggan->update($validated);

        return new PelangganResource($pelanggan);
    }

    // DELETE: Menghapus data pelanggan
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return response()->noContent();
    }
}