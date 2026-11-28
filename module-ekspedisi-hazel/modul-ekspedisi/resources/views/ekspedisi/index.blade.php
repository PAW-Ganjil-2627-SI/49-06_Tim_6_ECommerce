@extends('layouts.app')

@section('title', 'Daftar Ekspedisi - Modul Ekspedisi Kirim')

@section('content')
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    {{-- Indikator Login & Tombol Switch Account (Sangat Berguna Untuk Testing) --}}
    <div style="background: #eef2f7; padding: 12px 20px; border-radius: 6px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            @auth
                Logged in as: <strong>{{ auth()->user()->name }}</strong> 
                <span style="background: #28a745; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; margin-left: 5px;">
                    Role: {{ strtoupper(auth()->user()->role) }}
                </span>
            @else
                <strong>Belum Login (Guest)</strong>
            @endauth
        </div>
        <div>
            <a href="/login-admin" style="background: #007bff; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; margin-right: 5px;">Switch to Admin</a>
            <a href="/login-staff" style="background: #17a2b8; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px;">Switch to Staff</a>
        </div>
    </div>

    <div class="kartu">
        <h2>Tambah Ekspedisi</h2>
        <form action="{{ route('ekspedisi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama-kurir">Nama Ekspedisi</label>
                <input type="text" id="nama-kurir" name="nama_kurir" placeholder="Contoh: JNE, SiCepat" required>
            </div>

            <div class="form-group">
                <label for="layanan">Jenis Layanan</label>
                <select id="layanan" name="layanan" required>
                    <option value="Reguler">Reguler</option>
                    <option value="Express">Express</option>
                </select>
            </div>

            <div class="form-group">
                <label for="zonasi">Zonasi (Wilayah Kirim)</label>
                <select id="zonasi" name="zonasi" required>
                    <option value="Pulau Jawa">Pulau Jawa</option>
                    <option value="Luar Jawa">Luar Jawa</option>
                </select>
            </div>

            <button type="submit" style="padding: 10px 15px; background: #007b7f; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Data</button>
        </form>
    </div>

    <div class="kartu">
        <h2>Daftar Ekspedisi</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kurir</th>
                    <th>Jenis Layanan</th>
                    <th>Zonasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ekspedisi as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nama_kurir }}</td>
                        <td>{{ $data->layanan }}</td>
                        <td>{{ $data->zonasi }}</td>
                        <td><span class="badge aktif">{{ $data->status }}</span></td>
                        <td>
                            <a href="{{ route('ekspedisi.show', $data->id) }}" style="color: blue; text-decoration: none;">Detail</a> | 
                            <a href="{{ route('ekspedisi.edit', $data->id) }}" style="color: orange; text-decoration: none;">Edit</a>
                            
                            {{-- Hanya tampil jika login sebagai Admin --}}
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                | 
                                <form action="{{ route('ekspedisi.destroy', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confrim('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0; font-size:inherit; text-decoration:underline;">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Belum ada data ekspedisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection