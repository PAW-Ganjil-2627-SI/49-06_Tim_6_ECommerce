@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Daftar Voucher</h1>
    <a href="{{ route('vouchers.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
        + Tambah Voucher
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left text-sm text-slate-600">
        <thead class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-semibold">
            <tr>
                <th class="px-6 py-4">NO</th>
                <th class="px-6 py-4">KODE</th>
                <th class="px-6 py-4">TIPE</th>
                <th class="px-6 py-4">BESARAN</th>
                <th class="px-6 py-4">SYARAT MIN</th>
                <th class="px-6 py-4 text-center">AKSI</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($vouchers as $index => $v)
            <tr class="hover:bg-slate-50">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4 font-bold text-indigo-600">{{ $v->kode }}</td>
                <td class="px-6 py-4">{{ ucfirst($v->tipe) }}</td>
                <td class="px-6 py-4">{{ $v->besaran }}</td>
                <td class="px-6 py-4">Rp {{ number_format($v->syarat_min ?? 0, 0, ',', '.') }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center items-center gap-2">
                        {{-- Tombol Edit (Admin & Staff) --}}
                        <a href="{{ route('vouchers.edit', $v->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                            Edit
                        </a>

                        {{-- Tombol Hapus (HANYA Admin) --}}
                        @if(strtolower(Auth::user()->role) === 'admin')
                            <form action="{{ route('vouchers.destroy', $v->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1 rounded-md text-xs font-semibold transition">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-slate-400">Belum ada data voucher.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection