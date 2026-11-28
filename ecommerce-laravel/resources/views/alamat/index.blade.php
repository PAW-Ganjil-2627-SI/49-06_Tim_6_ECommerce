<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Alamat Pelanggan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('alamat.create') }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4">
                    + Tambah Alamat
                </a>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3">No</th>
                                <th class="border p-3">Pelanggan</th>
                                <th class="border p-3">Tipe Alamat</th>
                                <th class="border p-3">Alamat</th>
                                <th class="border p-3">Kota</th>
                                <th class="border p-3">Kode Pos</th>
                                <th class="border p-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alamats as $alamat)
                                <tr>
                                    <td class="border p-3">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $alamat->pelanggan->nama ?? '-' }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $alamat->tipe_alamat }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $alamat->alamat }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $alamat->kota }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $alamat->kode_pos }}
                                    </td>
                                    <td class="border p-3 whitespace-nowrap">
                                        <a href="{{ route('alamat.edit', $alamat->id) }}"
                                           class="text-blue-600">Edit</a>

                                        <form action="{{ route('alamat.destroy', $alamat->id) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus alamat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 ml-2">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border p-4 text-center">
                                        Belum ada data alamat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
