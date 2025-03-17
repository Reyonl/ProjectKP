@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Barang</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">
        @csrf
        <!-- Kode Barang -->
        <div>
            <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <!-- Nama Sparepart -->
        <div>
            <label for="nama_sparepart" class="block text-sm font-medium text-gray-700">Nama Sparepart</label>
            <input type="text" name="nama_sparepart" id="nama_sparepart" placeholder="Masukkan Nama Sparepart"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <!-- Modal -->
        <div>
            <label for="modal" class="block text-sm font-medium text-gray-700">Modal</label>
            <div class="relative">
                <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                <input type="text" name="modal" id="modal" placeholder="Masukkan Modal"
                    class="mt-1 block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
        </div>

        <!-- Harga Jual -->
        <div>
            <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
            <div class="relative">
                <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                <input type="text" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual"
                    class="mt-1 block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
        </div>

        <!-- Stok -->
        <div>
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stok" id="stok" placeholder="Masukkan Stok"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Simpan Barang
            </button>
        </div>
    </form>
</div>

<!-- Script untuk format ke Rupiah -->
<script>
    // Fungsi format angka ke format rupiah
    function formatRupiah(angka, prefix) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }

    // Format otomatis input Modal
    const modalInput = document.getElementById('modal');
    modalInput.addEventListener('input', function(e) {
        let value = this.value.replace(/[^0-9]/g, '');
        this.value = formatRupiah(value, '');
    });

    // Format otomatis input Harga Jual
    const hargaJualInput = document.getElementById('harga_jual');
    hargaJualInput.addEventListener('input', function(e) {
        let value = this.value.replace(/[^0-9]/g, '');
        this.value = formatRupiah(value, '');
    });
</script>
@endsection
