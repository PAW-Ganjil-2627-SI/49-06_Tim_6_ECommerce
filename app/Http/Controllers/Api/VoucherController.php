<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        return VoucherResource::collection(Voucher::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_voucher'   => 'required|unique:vouchers,kode_voucher',
            'tipe_diskon'    => 'required|in:persen,nominal',
            'besaran'        => 'required|numeric|min:0',
            'syarat_minimum' => 'required|numeric|min:0',
        ]);

        $voucher = Voucher::create($validated);

        return (new VoucherResource($voucher))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Voucher $voucher)
    {
        return new VoucherResource($voucher);
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validated = $request->validate([
            'kode_voucher'   => 'required|unique:vouchers,kode_voucher,' . $voucher->id,
            'tipe_diskon'    => 'required|in:persen,nominal',
            'besaran'        => 'required|numeric|min:0',
            'syarat_minimum' => 'required|numeric|min:0',
        ]);

        $voucher->update($validated);

        return new VoucherResource($voucher);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return response()->noContent();
    }
}