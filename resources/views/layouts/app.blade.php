<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite('resources/css/app.css')
    @viteReactRefresh
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 h-screen text-white">
            <div class="p-4 border-b border-gray-700">
                <h1 class="text-2xl font-bold tracking-wide">Enoni Cellular</h1>
            </div>
            <ul class="mt-4">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 p-3 hover:bg-gray-700 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12l2-2m0 0l7-7 7 7m-7-7v18"></path>
                        </svg>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                </li>
            </ul>

            <!-- Master Section -->
            <div class="mt-6 px-3 text-gray-400 uppercase text-sm tracking-wide">Master</div>
            <ul class="mt-2">
                <li>
                    <a href="{{ route('barang.index') }}"
                        class="flex items-center gap-3 p-3 hover:bg-gray-700 rounded-lg transition {{ request()->routeIs('barang.index') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8"></path>
                            <path d="M3 16l9-6 9 6"></path>
                        </svg>
                        <span class="font-semibold">Daftar Sparepart</span>
                    </a>
                </li>
            </ul>

            <!-- Teknisi Section -->
            <div class="mt-6 px-3 text-gray-400 uppercase text-sm tracking-wide">Teknisi</div>
            <ul class="mt-2">
                <li>
                    <a href="#"
                        class="flex items-center gap-3 p-3 hover:bg-gray-700 rounded-lg transition {{ request()->is('service*') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                        <span class="font-semibold">Service</span>
                    </a>
                </li>
            </ul>

            <!-- Laporan Section -->
            <div class="mt-6 px-3 text-gray-400 uppercase text-sm tracking-wide">Laporan</div>
            <ul class="mt-2">
                <li>
                    <a href="{{ route('laporan.index') }}"
                        class="flex items-center gap-3 p-3 hover:bg-gray-700 rounded-lg transition {{ request()->routeIs('laporan.index') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12l3 3 3-3"></path>
                            <path d="M21 12l-3 3-3-3"></path>
                        </svg>
                        <span class="font-semibold">Laporan Belanja</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>
