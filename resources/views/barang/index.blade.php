@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Daftar Barang</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('barang.index') }}" method="GET" class="mb-6">
        <div class="flex items-center gap-2 justify-end">
            <!-- Icon Search -->
            <div class="relative">
                <button type="button" id="search-btn" class="p-2">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.35 4.35a7.5 7.5 0 0010.3 10.3z"></path>
                    </svg>
                </button>
            </div>

            <!-- Input Search (Hidden Default) -->
            <div id="search-field" class="opacity-0 scale-0 transition-all duration-300 ease-in-out origin-left">
                <input type="text" name="search"
                    class="w-72 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-md"
                    placeholder="Cari berdasarkan nama atau kode barang..."
                    value="{{ request('search') }}">
            </div>

            <!-- Tombol Cari -->
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                Cari
            </button>

            @if(request('search'))
                <a href="{{ route('barang.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                    Reset
                </a>
            @endif
        </div>
    </form>


    <!-- Button Tambah Barang -->
    <div class="mb-4">
        <a href="{{ route('barang.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-300">
            + Tambah Barang
        </a>
    </div>

    <!-- Tabel Daftar Barang -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 border border-gray-200 text-center">No</th>
                    <th class="px-4 py-2 border border-gray-200 text-left">Kode Barang</th>
                    <th class="px-4 py-2 border border-gray-200 text-left">Nama Barang</th>
                    <th class="px-4 py-2 border border-gray-200 text-left">Harga Modal</th>
                    <th class="px-4 py-2 border border-gray-200 text-left">Harga Jual</th>
                    <th class="px-4 py-2 border border-gray-200 text-center">Stok</th>
                    <th class="px-4 py-2 border border-gray-200 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $index => $item)
                <tr>
                    <td class="px-4 py-2 border border-gray-200 text-center">{{ ($barang->currentPage() - 1) * $barang->perPage() + $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $item->kode_barang }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $item->nama_sparepart }}</td>
                    <td class="px-4 py-2 border border-gray-200">Rp {{ number_format($item->modal, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-200">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-200 text-center">{{ $item->stok }}</td>
                    <td class="px-4 py-2 border border-gray-200 text-center">
                        <form action="{{ route('barang.belanja', $item->kode_barang) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="number" name="jumlah" min="1" value="1" class="w-16 border border-gray-300 rounded px-2 py-1 text-center" required>
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded">
                                Update Stok
                            </button>
                        </form>
                        <a href="{{ route('barang.edit', $item->kode_barang) }}" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $barang->links('pagination::tailwind') }}
        </div>

    </div>
</div>

<!-- SweetAlert untuk pesan error -->
@if (session('error'))
<script>

document.addEventListener('DOMContentLoaded', () => {
        const searchBtn = document.getElementById('search-btn');
        const searchField = document.getElementById('search-field');

        searchBtn.addEventListener('click', () => {
            if (searchField.classList.contains('opacity-0')) {
                searchField.classList.remove('opacity-0', 'scale-0');
                searchField.classList.add('opacity-100', 'scale-100');
            } else {
                searchField.classList.add('opacity-0', 'scale-0');
                searchField.classList.remove('opacity-100', 'scale-100');
            }
        });

    });
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection
