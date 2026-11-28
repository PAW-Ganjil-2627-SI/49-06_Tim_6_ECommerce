<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Toko Online UMKM
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
                <h3 class="text-lg font-bold text-gray-800">
                    Selamat Datang!
                </h3>
                <p class="text-gray-600 mt-2">
                    Selamat datang di sistem pengelolaan data pelanggan dan alamat.
                    Silakan pilih menu yang ingin kamu buka.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                        Data Pelanggan
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Mengelola informasi pelanggan, seperti nama, email,
                        nomor telepon, dan data lainnya.
                    </p>
                    <a href="{{ route('pelanggan.index') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Buka Data Pelanggan
                    </a>
                </div>

                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                        Data Alamat
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Mengelola alamat pelanggan, termasuk tipe alamat,
                        alamat lengkap, kota, dan kode pos.
                    </p>
                    <a href="{{ route('alamat.index') }}"
                       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Buka Data Alamat
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
