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
        <div>
            <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="nama_sparepart" class="block text-sm font-medium text-gray-700">Nama Sparepart</label>
            <input type="text" name="nama_sparepart" id="nama_sparepart"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="modal" class="block text-sm font-medium text-gray-700">Modal</label>
            <input type="number" name="modal" id="modal"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
            <input type="number" name="harga_jual" id="harga_jual"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stok" id="stok"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-300">
                Simpan Barang
            </button>
        </div>
    </form>
</div>
@endsection
