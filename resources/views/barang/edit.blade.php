@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 border rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Sparepart -->
        <div class="mb-4">
            <label for="nama_sparepart" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" id="nama_sparepart" name="nama_sparepart" value="{{ $barang->nama_sparepart }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('nama_sparepart')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Modal -->
        <div class="mb-4">
            <label for="modal" class="block text-sm font-medium text-gray-700">Harga Modal</label>
            <input type="number" id="modal" name="modal" value="{{ $barang->modal }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('modal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Harga Jual -->
        <div class="mb-4">
            <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
            <input type="number" id="harga_jual" name="harga_jual" value="{{ $barang->harga_jual }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('harga_jual')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Stok -->
        <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" id="stok" name="stok" value="{{ $barang->stok }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('stok')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
