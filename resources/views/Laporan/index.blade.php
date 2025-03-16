@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Laporan Belanja</h2>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama Barang</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Tanggal Belanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->nama_sparepart }}</td>
                    <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2 border">{{ $item->tanggal_belanja }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
