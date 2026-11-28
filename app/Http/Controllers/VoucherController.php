<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->get();
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required|unique:vouchers,kode_voucher',
            'tipe_diskon'   => 'required|in:persen,nominal',
            'besaran'       => 'required|numeric|min:0',
            'syarat_minimum'=> 'required|numeric|min:0',
        ]);

        Voucher::create($request->all());

        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil ditambahkan!');
    }

    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'kode_voucher' => 'required|unique:vouchers,kode_voucher,' . $voucher->id,
            'tipe_diskon'   => 'required|in:persen,nominal',
            'besaran'       => 'required|numeric|min:0',
            'syarat_minimum'=> 'required|numeric|min:0',
        ]);

        $voucher->update($request->all());

        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil diperbarui!');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->route('vouchers.index')->with('success', 'Voucher berhasil dihapus!');
    }
}