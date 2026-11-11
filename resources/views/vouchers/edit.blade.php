@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
    <h2 class="text-xl font-bold mb-4">Edit Voucher</h2>

    <form action="{{ route('vouchers.update', $voucher->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium mb-1">Kode Voucher</label>
            <input type="text" name="kode_voucher" value="{{ $voucher->kode_voucher }}" class="w-full border rounded-lg p-2 text-sm uppercase" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Tipe Diskon</label>
                <select name="tipe_diskon" class="w-full border rounded-lg p-2 text-sm" required>
                    <option value="persen" {{ $voucher->tipe_diskon == 'persen' ? 'selected' : '' }}>Persen (%)</option>
                    <option value="nominal" {{ $voucher->tipe_diskon == 'nominal' ? 'selected' : '' }}>Nominal (Rp)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Besaran</label>
                <input type="number" step="0.01" name="besaran" value="{{ $voucher->besaran }}" class="w-full border rounded-lg p-2 text-sm" required>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Syarat Minimum (Rp)</label>
            <input type="number" step="0.01" name="syarat_minimum" value="{{ $voucher->syarat_minimum }}" class="w-full border rounded-lg p-2 text-sm" required>
        </div>
        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('vouchers.index') }}" class="px-4 py-2 border rounded-lg text-sm">Batal</a>
            <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded-lg text-sm">Update</button>
        </div>
    </form>
</div>
@endsection