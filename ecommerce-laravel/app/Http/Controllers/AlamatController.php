<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Pelanggan;
use App\Http\Requests\AlamatRequest;

class AlamatController extends Controller
{
    public function index()
    {
        $alamats = Alamat::with('pelanggan')->latest()->get();

        return view('alamat.index', compact('alamats'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();

        return view('alamat.create', compact('pelanggans'));
    }

    public function store(AlamatRequest $request)
    {
        Alamat::create($request->validated());

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function show(Alamat $alamat)
    {
        return view('alamat.show', compact('alamat'));
    }

    public function edit(Alamat $alamat)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();

        return view('alamat.edit', compact('alamat', 'pelanggans'));
    }

    public function update(AlamatRequest $request, Alamat $alamat)
    {
        $alamat->update($request->validated());

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat berhasil diperbarui.');
    }

    public function destroy(Alamat $alamat)
    {
        $alamat->delete();

        return redirect()->route('alamat.index')
            ->with('success', 'Alamat berhasil dihapus.');
    }
}