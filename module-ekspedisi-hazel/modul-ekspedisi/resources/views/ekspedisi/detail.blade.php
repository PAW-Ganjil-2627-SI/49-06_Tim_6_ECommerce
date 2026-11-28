@extends('layouts.app')

@section('title', 'Detail Ekspedisi - Modul Ekspedisi Kirim')

@section('content')
    <div class="kartu">
        <h2 id="detail-judul">Detail Informasi Ekspedisi</h2>
        
        <table class="detail-table">
            <tr>
                <th>Nama Ekspedisi</th>
                <td id="detail-nama">{{ $ekspedisi->nama_kurir }}</td>
            </tr>
            <tr>
                <th>Jenis Layanan</th>
                <td id="detail-layanan">{{ $ekspedisi->layanan }}</td>
            </tr>
            <tr>
                <th>Zonasi Pengiriman</th>
                <td id="detail-zonasi">{{ $ekspedisi->zonasi }}</td>
            </tr>
            <tr>
                <th>Estimasi Waktu</th>
                <td id="detail-estimasi">{{ $ekspedisi->estimasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tarif Dasar</th>
                <td id="detail-tarif">{{ $ekspedisi->tarif ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status Operasional</th>
                <td><span class="badge aktif" id="detail-status">{{ $ekspedisi->status }}</span></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td id="detail-keterangan">{{ $ekspedisi->keterangan ?? '-' }}</td>
            </tr>
        </table>

        <div style="margin-top: 20px;">
            <a href="{{ route('ekspedisi.index') }}" class="btn-kembali">&larr; Kembali ke Daftar Ekspedisi</a>
        </div>
    </div>
@endsection