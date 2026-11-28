<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Alamat Pelanggan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('alamat.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">Pelanggan</label>
                        <select name="pelanggan_id"
                                class="w-full border-gray-300 rounded-md"
                                required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
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
                            <option value="">-- Pilih Tipe --</option>
                            <option value="Rumah" {{ old('tipe_alamat') == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                            <option value="Kantor" {{ old('tipe_alamat') == 'Kantor' ? 'selected' : '' }}>Kantor</option>
                            <option value="Lainnya" {{ old('tipe_alamat') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Kota</label>
                        <input type="text"
                               name="kota"
                               value="{{ old('kota') }}"
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
                               value="{{ old('kode_pos') }}"
                               class="w-full border-gray-300 rounded-md"
                               required>
                        @error('kode_pos')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
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
