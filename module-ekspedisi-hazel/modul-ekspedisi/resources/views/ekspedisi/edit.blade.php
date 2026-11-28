@extends('layouts.app')

@section('title', 'Edit Ekspedisi - Modul Ekspedisi Kirim')

@section('content')
    <div class="kartu">
        <h2>Edit Ekspedisi</h2>
        <form action="{{ route('ekspedisi.update', $ekspedisi->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama-kurir">Nama Ekspedisi</label>
                <input type="text" id="nama-kurir" name="nama_kurir" value="{{ $ekspedisi->nama_kurir }}" required>
            </div>

            <div class="form-group">
                <label for="layanan">Jenis Layanan</label>
                <select id="layanan" name="layanan" required>  
                    <option value="Reguler" {{ $ekspedisi->layanan == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    <option value="Express" {{ $ekspedisi->layanan == 'Express' ? 'selected' : '' }}>Express</option>
                </select>
            </div>

            <div class="form-group">    
                <label for="zonasi">Zonasi (Wilayah Kirim)</label>
                <select id="zonasi" name="zonasi" required>
                    <option value="Pulau Jawa" {{ $ekspedisi->zonasi == 'Pulau Jawa' ? 'selected' : '' }}>Pulau Jawa</option>
                    <option value="Luar Jawa" {{ $ekspedisi->zonasi == 'Luar Jawa' ? 'selected' : '' }}>Luar Jawa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status Operasional</label>
                <select id="status" name="status" required>
                    <option value="Aktif" {{ $ekspedisi->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Non-Aktif" {{ $ekspedisi->status == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
            </div>
            
            <button type="submit" style="padding: 10px 15px; background: #007b7f; color: white; border: none; border-radius: 4px; cursor: pointer;">Perbarui Data</button>
            <a href="{{ route('ekspedisi.index') }}" class="btn-kembali" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
@endsection