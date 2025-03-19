@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6 itim-regular">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Daftar Barang</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('barang.index') }}" method="GET" class="mb-6">
        <div class="flex items-center gap-2 justify-end">

            <!-- Pilih Kategori -->
            <select name="kategori" id="kategori"
                class="w-40 pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-md">
                <option value="">Pilih Kategori</option>
                <option value="lcd" {{ request('kategori') == 'lcd' ? 'selected' : '' }}>LCD</option>
                <option value="baterai" {{ request('kategori') == 'baterai' ? 'selected' : '' }}>Baterai</option>
                <option value="flexible" {{ request('kategori') == 'flexible' ? 'selected' : '' }}>Flexible</option>
            </select>

            <!-- Pilih Brand -->
            <select name="brand" id="brand"
                class="w-40 pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-md">
                <option value="">Pilih Brand</option>
                <option value="xiaomi" {{ request('brand') == 'xiaomi' ? 'selected' : '' }}>Xiaomi</option>
                <option value="samsung" {{ request('brand') == 'samsung' ? 'selected' : '' }}>Samsung</option>
                <option value="realme" {{ request('brand') == 'realme' ? 'selected' : '' }}>Realme</option>
                <option value="oppo" {{ request('brand') == 'oppo' ? 'selected' : '' }}>Oppo</option>
                <option value="iphone" {{ request('brand') == 'iphone' ? 'selected' : '' }}>iPhone</option>
            </select>

            <!-- Input Search -->
            <div id="search-field" class="{{ request('search') || request('kategori') || request('brand') ? 'opacity-100 scale-100' : 'opacity-0 scale-0' }} transition-all duration-300 ease-in-out origin-left">
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

            @if(request('search') || request('kategori') || request('brand'))
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
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr>
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
            @php
    $notifications = [];
@endphp

@foreach ($barang as $index => $item)
    @if ($item->stok <= 1)
        @php
            $notifications[] = "Stok $item->nama_sparepart tinggal $item->stok lagi!";
        @endphp
    @endif

    <tr>
        <td class="px-4 py-2 border border-gray-200 text-center">{{ ($barang->currentPage() - 1) * $barang->perPage() + $loop->iteration }}</td>
        <td class="px-4 py-2 border border-gray-200">{{ $item->kode_barang }}</td>
        <td class="px-4 py-2 border border-gray-200">{{ $item->nama_sparepart }}</td>
        <td class="px-4 py-2 border border-gray-200">Rp {{ number_format($item->modal, 0, ',', '.') }}</td>
        <td class="px-4 py-2 border border-gray-200">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
        <td class="px-4 py-2 border border-gray-200 text-center">{{ $item->stok }}</td>
        <td class="px-4 py-2 border border-gray-200 text-center">
            <div x-data="{ open: false }">
    <!-- Tombol untuk membuka modal -->
    <button @click="open = true" class="bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded">
        Update Stok
    </button>

    <!-- Pop-up Modal -->
    <div x-show="open" x-cloak style="display: none;"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
    >
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold mb-4">Tambah Stok</h2>

            <form action="{{ route('barang.belanja', $item->kode_barang) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-700 font-medium">Jumlah Stok</label>
                    <input type="number" name="jumlah" min="1" value="1" required
                        class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-gray-800">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




            <!-- Tombol Edit -->
            <a href="{{ route('barang.edit', $item->kode_barang) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded ml-2">
                Edit
            </a>

            <!-- Tombol Hapus -->
            <form id="delete-form-{{ $item->kode_barang }}" action="{{ route('barang.destroy', $item->kode_barang) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete('{{ $item->kode_barang }}')"
                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
@endforeach

@if (!empty($notifications))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    let notifications = @json($notifications);
    notifications.forEach((message, index) => {
        setTimeout(() => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    // Event listener untuk mengarahkan ke halaman tertentu saat diklik
                    toast.addEventListener('click', () => {
                        // Arahkan ke halaman detail atau update stok
                        window.location.href = "{{ route('barang.edit', $item->kode_barang) }}";
                    });
                }
            });
        }, index * 3500); // Jeda antar notifikasi 3.5 detik
    });
});


        // Fungsi konfirmasi hapus
        function confirmDelete(kode_barang) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${kode_barang}`).submit();
                }
            });
        }

        // Fungsi update stok
        function updateStok(kode_barang) {
            Swal.fire({
                title: 'Update Stok',
                input: 'number',
                inputAttributes: {
                    min: 0,
                    step: 1
                },
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                preConfirm: (stokBaru) => {
                    if (!stokBaru || stokBaru < 0) {
                        Swal.showValidationMessage('Stok tidak boleh kosong atau negatif!');
                    } else {
                        // Kirim data update ke backend menggunakan AJAX
                        fetch(`/barang/update-stok/${kode_barang}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ stok: stokBaru })
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire('Sukses!', 'Stok berhasil diperbarui', 'success').then(() => {
                                    location.reload(); // Reload halaman setelah update
                                });
                            } else {
                                Swal.fire('Error!', 'Terjadi kesalahan saat memperbarui stok', 'error');
                            }
                        });
                    }
                }
            });
        }
    </script>
@endif


        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $barang->links() }}
    </div>
</div>

<!-- SweetAlert -->
<script>
function confirmDelete(kodeBarang) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${kodeBarang}`).submit();
        }
    });
}

@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
@endif

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    });
@endif
</script>
@endsection
