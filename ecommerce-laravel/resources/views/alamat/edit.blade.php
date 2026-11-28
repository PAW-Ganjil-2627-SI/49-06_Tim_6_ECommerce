<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Alamat Pelanggan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('alamat.update', $alamat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-2">Pelanggan</label>
                        <select name="pelanggan_id"
                                class="w-full border-gray-300 rounded-md"
                                required>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                    {{ old('pelanggan_id', $alamat->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                    {{ $pelanggan->nama }} - {{ $pelanggan->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Tipe Alamat</label>
                        <select name="tipe_alamat"
                                class="w-full border-gray-300 rounded-md"
                                required>
                            @foreach (['Rumah', 'Kantor', 'Lainnya'] as $tipe)
                                <option value="{{ $tipe }}"
                                    {{ old('tipe_alamat', $alamat->tipe_alamat) == $tipe ? 'selected' : '' }}>
                                    {{ $tipe }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipe_alamat')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Alamat Lengkap</label>
                        <textarea name="alamat"
                                  class="w-full border-gray-300 rounded-md"
                                  rows="3"
                                  required>{{ old('alamat', $alamat->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Kota</label>
                        <input type="text"
                               name="kota"
                               value="{{ old('kota', $alamat->kota) }}"
                               class="w-full border-gray-300 rounded-md"
                               required>
                        @error('kota')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2">Kode Pos</label>
                        <input type="text"
                               name="kode_pos"
                               value="{{ old('kode_pos', $alamat->kode_pos) }}"
                               class="w-full border-gray-300 rounded-md"
                               required>
                        @error('kode_pos')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update
                    </button>

                    <a href="{{ route('alamat.index') }}"
                       class="ml-2 text-gray-600">
                        Batal
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
