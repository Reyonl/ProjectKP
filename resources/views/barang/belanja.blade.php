@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Belanja Barang</h2>

    {{-- Menampilkan Nama Barang --}}
    <p class="mb-2 text-gray-700"><strong>Kode Barang:</strong> {{ $barang->kode_barang }}</p>
    <p class="mb-4 text-gray-700"><strong>Nama Barang:</strong> {{ $barang->nama_barang }}</p>

    {{-- Form untuk Belanja --}}
    <form action="{{ route('barang.prosesBelanja', $barang->kode_barang) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
            <input type="number" name="jumlah" id="jumlah" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow">
            Simpan
        </button>
    </form>
</div>
@endsection
