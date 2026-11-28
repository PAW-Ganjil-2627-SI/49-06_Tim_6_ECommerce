<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - E-Commerce UMKM</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f6f8; margin: 0; color: #222; }
        header { background: #1016de; color: white; padding: 20px 5%; }
        main { width: 90%; max-width: 700px; margin: 35px auto; }
        .panel { background: white; padding: 25px; border-radius: 10px; }
        label { display: block; margin: 15px 0 7px; font-weight: bold; }
        input, select, textarea {
            width: 100%; padding: 11px; border: 1px solid #ccc;
            border-radius: 5px; font: inherit;
        }
        textarea { resize: vertical; }
        button, a {
            display: inline-block; padding: 11px 15px; border: 0;
            border-radius: 5px; text-decoration: none; cursor: pointer; font-size: 14px;
        }
        button { background: #2563eb; color: white; margin-top: 20px; }
        a { background: #e5e7eb; color: #222; }
        .error { color: #dc2626; font-size: 14px; }
    </style>
</head>
<body>
    <header>
        <h2>E-Commerce UMKM</h2>
        <p>Edit Data Pelanggan</p>
    </header>

    <main>
        <div class="panel">
            <h2>Form Edit Pelanggan</h2>

            @if ($errors->any())
                <ul class="error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}" required>

                <label>Nomor Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $pelanggan->telepon) }}" required>

                <label>Tipe Alamat</label>
                <select name="tipe_alamat" required>
                    <option value="Rumah" {{ old('tipe_alamat', $pelanggan->tipe_alamat) == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                    <option value="Kos" {{ old('tipe_alamat', $pelanggan->tipe_alamat) == 'Kos' ? 'selected' : '' }}>Kos</option>
                </select>

                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>

                <label>Kota</label>
                <input type="text" name="kota" value="{{ old('kota', $pelanggan->kota) }}" required>

                <label>Kode Pos</label>
                <input type="text" name="kode_pos" value="{{ old('kode_pos', $pelanggan->kode_pos) }}" required>

                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('pelanggan.index') }}">Kembali</a>
            </form>
        </div>
    </main>
</body>
</html>
