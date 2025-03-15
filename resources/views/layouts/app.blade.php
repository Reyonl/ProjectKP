<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 h-screen text-white">
            <div class="p-4">
                <h1 class="text-xl font-bold">Enoni Cellular</h1>
            </div>
            <ul>

                <li class="p-2 hover:bg-gray-700"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>
            <ul>
                <div>MASTER</div>
                <li class="p-2 hover:bg-gray-700"><a href="{{ route('barang.index') }}">Daftar Sparepart</a></li>
            </ul>

            <ul>

            </ul>

            <ul>
                <div>Teknisi</div>
                <div>Service</div>
            </ul>
            <ul>
                <div>Penjualan</div>
                <div>Laporan</div>
            </ul>
            
        </div>

        <!-- Content -->
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</body>
</html>
