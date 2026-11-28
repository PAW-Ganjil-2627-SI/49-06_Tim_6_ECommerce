<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    public function index()
    {
        $ekspedisi = Ekspedisi::orderBy('id', 'desc')->get();
        return view('ekspedisi.index', compact('ekspedisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'layanan'    => 'required|string',
            'zonasi'     => 'required|string',
        ]);

        Ekspedisi::create([
            'nama_kurir' => $request->nama_kurir,
            'layanan'    => $request->layanan,
            'zonasi'     => $request->zonasi,
            'status'     => 'Aktif',
            'estimasi'   => '1-3 Hari',
            'tarif'      => 'Rp 10.000',
            'keterangan' => 'Pengiriman sesuai jalur armada ' . $request->zonasi,
        ]);

        return redirect()->route('ekspedisi.index')->with('success', 'Data ekspedisi berhasil disimpan!');
    }

    public function show($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        return view('ekspedisi.detail', compact('ekspedisi'));
    }

    public function edit($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        return view('ekspedisi.edit', compact('ekspedisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'layanan'    => 'required|string',
            'zonasi'     => 'required|string',
            'status'     => 'required|string',
        ]);

        $ekspedisi = Ekspedisi::findOrFail($id);
        $ekspedisi->update($request->only(['nama_kurir', 'layanan', 'zonasi', 'status']));

        return redirect()->route('ekspedisi.index')->with('success', 'Data ekspedisi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        $ekspedisi->delete();

        return redirect()->route('ekspedisi.index')->with('success', 'Data ekspedisi berhasil dihapus!');
    }
}