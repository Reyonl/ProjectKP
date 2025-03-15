@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Sistem Point Of Sales Enoni Cell </h2>
            <div class="flex items-center">
                {{-- <span class="mr-2">Welcome, Reyon Lau</span> --}}

            </div>
        </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- total teknisi --}}
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Teknisi</h2>
            <p class="text-3xl font-bold">{{ $jumlahTeknisi }}</p>
        </div>

        <!-- Total Barang -->
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Barang</h2>
            <p class="text-3xl font-bold">{{ $jumlahBarang }}</p>
        </div>

        <!-- Total Penjualan -->
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Penjualan</h2>
            <p class="text-3xl font-bold">{{ $jumlahPenjualan }}</p>
        </div>

        <!-- Total Service -->
        <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Service</h2>
            <p class="text-3xl font-bold">{{ $jumlahService }}</p>
        </div>

        <!-- Total Profit -->
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Profit</h2>
            <p class="text-3xl font-bold">Rp {{ number_format($totalProfit, 0, ',', '.') }}</p>
        </div>
    </div>
</div>
@endsection
