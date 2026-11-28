<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - E-Commerce</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h1 { color: #2563eb; }
        .tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
	
.tombol-aksi {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.tambah {
    margin-bottom: 0;
}

.kembali {
    display: inline-block;
    background: #eaf1ff;
    color: #2563eb;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    border: 1px solid #dbeafe;
}

.kembali:hover {
    background: #dbeafe;
}

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th { background: #eaf1ff; }
        .aksi { display: flex; gap: 8px; }
        .edit { color: #2563eb; }
        .hapus { color: #dc2626; }
        .sukses { color: green; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Pelanggan</h1>
    <p>Kelola data pelanggan E-Commerce.</p>

    @if (session('success'))
        <p class="sukses">{{ session('success') }}</p>
    @endif

   


<div class="tombol-aksi">
    <a href="{{ route('dashboard') }}" class="kembali">
        &larr; Kembali ke Dashboard
    </a>

    <a href="{{ route('pelanggan.create') }}" class="tambah">
        + Tambah Pelanggan
    </a>
</div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Tipe Alamat</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>{{ $pelanggan->telepon }}</td>
                    <td>{{ $pelanggan->tipe_alamat }}</td>
                    <td>{{ $pelanggan->kota }}</td>
                    <td>
                        <div class="aksi">
    <a class="edit"
       href="{{ route('pelanggan.edit', $pelanggan->id) }}">
        Edit
    </a>

    @if (auth()->user()->role === 'admin')
        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="hapus">Hapus</button>
        </form>
    @endif
</div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
