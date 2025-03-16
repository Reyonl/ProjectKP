@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Laporan Belanja</h2>

    {{-- Tabel Laporan Belanja --}}
    <table class="min-w-full bg-white border border-gray-200 mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama Barang</th>
                <th class="px-4 py-2 border">Harga Barang</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Total Harga</th>
                <th class="px-4 py-2 border">Tanggal Belanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->nama_sparepart }}</td>
                    <td class="px-4 py-2 border border-gray-200">Rp {{number_format($item->modal, 0,',','.') }}</td> {{--  ini dari table barang --}}
                    <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2 border">Rp{{ number_format($item->modal * $item->jumlah, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">{{ $item->tanggal_belanja }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-xl font-semibold mb-4">Riwayat Terjual</h2>

    {{-- Tabel Riwayat Terjual --}}
    <table class="min-w-full bg-white border border-gray-200 mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama Barang</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Total Harga</th>
                <th class="px-4 py-2 border">Tanggal Terjual</th>
                <th class="px-4 py-2 border">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayatTerjual as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->nama_sparepart }}</td>
                    <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2 border">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">{{ $item->tanggal_penjualan }}</td>
                    <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2 border">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-xl font-semibold mb-4">Total Penjualan Per Bulan</h2>

    {{-- Tabel Total Penjualan Per Bulan --}}
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Bulan</th>
                <th class="px-4 py-2 border">Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalPenjualanBulanan as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ DateTime::createFromFormat('!m', $item->bulan)->format('F') }} {{ $item->tahun }}</td>
                    <td class="px-4 py-2 border">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
