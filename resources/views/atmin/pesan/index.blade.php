@extends('layout.admin')

@section('title', 'Manajemen Pesan')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold gradient-text flex items-center gap-2">
            <i data-feather="mail"></i> Manajemen Pesan
        </h2>
        <p class="text-gray-500 text-sm">Pesan masuk dari pengunjung website</p>
    </div>
</div>

{{-- Search --}}
<div class="mb-4">
    <input type="text" id="searchInput" placeholder="Cari nama atau email..."
        class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none text-sm">
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl shadow-md overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 w-10">#</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Pesan</th>
                <th class="px-4 py-3 whitespace-nowrap">Waktu</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pesans as $index => $pesan)
                <tr class="border-t hover:bg-gray-50 transition pesan-row {{ !$pesan->is_read ? 'bg-pink-50' : '' }}"
                    id="row-{{ $pesan->id }}">
                    <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800 pesan-nama whitespace-nowrap">{{ $pesan->name }}</td>
                    <td class="px-4 py-3 text-gray-600 pesan-email whitespace-nowrap">{{ $pesan->email }}</td>
                    <td class="px-4 py-3 text-gray-600" style="max-width: 200px;">
                        <span class="block truncate">{{ $pesan->message }}</span>
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs whitespace-nowrap">
                        {{ $pesan->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap" id="status-{{ $pesan->id }}">
                        @if (!$pesan->is_read)
                            <span class="px-2 py-1 text-xs rounded-full bg-pink-100 text-pink-600 font-semibold">Belum dibaca</span>
                        @else
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">Dibaca</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex justify-center items-center gap-2 whitespace-nowrap">

                            {{-- Tombol Lihat --}}
                            <button type="button"
                                class="btn-lihat flex items-center gap-1 px-3 py-1.5 text-xs rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition"
                                data-id="{{ $pesan->id }}"
                                data-nama="{{ $pesan->name }}"
                                data-email="{{ $pesan->email }}"
                                data-pesan="{{ $pesan->message }}"
                                data-waktu="{{ $pesan->created_at->format('d M Y, H:i') }}"
                                data-isread="{{ $pesan->is_read ? '1' : '0' }}"
                                data-url="{{ route('admin.pesan.read', $pesan) }}">
                                <i data-feather="eye" class="w-3 h-3"></i> Lihat
                            </button>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.pesan.destroy', $pesan) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-delete flex items-center gap-1 px-3 py-1.5 text-xs rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                    <i data-feather="trash-2" class="w-3 h-3"></i> Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada pesan masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<p id="emptySearch" class="text-center text-gray-400 mt-4 hidden">Tidak ada pesan yang cocok.</p>

{{-- MODAL DETAIL PESAN --}}
<div id="pesanModal" class="fixed inset-0 bg-black/50 flex justify-center items-center hidden z-50 px-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 relative">
        <button onclick="tutupModal()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>

        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
            <i data-feather="mail" class="text-pink-500 w-5 h-5"></i> Detail Pesan
        </h3>

        <div class="space-y-3 text-sm">
            <div>
                <p class="text-gray-500 text-xs uppercase font-semibold mb-1">Nama</p>
                <p id="modalNama" class="text-gray-800 font-medium"></p>
            </div>
            <div>
                <p class="text-gray-500 text-xs uppercase font-semibold mb-1">Email</p>
                <p id="modalEmail" class="text-gray-800"></p>
            </div>
            <div>
                <p class="text-gray-500 text-xs uppercase font-semibold mb-1">Waktu</p>
                <p id="modalWaktu" class="text-gray-500 text-xs"></p>
            </div>
            <div>
                <p class="text-gray-500 text-xs uppercase font-semibold mb-1">Pesan</p>
                <div id="modalPesan" class="text-gray-700 bg-gray-50 rounded-lg p-3 leading-relaxed whitespace-pre-wrap max-h-48 overflow-y-auto"></div>
            </div>
            <div>
                <p class="text-gray-500 text-xs uppercase font-semibold mb-1">Status</p>
                <div id="modalStatus"></div>
            </div>
        </div>

        <div class="mt-5 flex justify-end">
            <button onclick="tutupModal()"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ===== TOMBOL LIHAT =====
    document.querySelectorAll('.btn-lihat').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id     = this.getAttribute('data-id');
            const nama   = this.getAttribute('data-nama');
            const email  = this.getAttribute('data-email');
            const pesan  = this.getAttribute('data-pesan');
            const waktu  = this.getAttribute('data-waktu');
            const isRead = this.getAttribute('data-isread');
            const url    = this.getAttribute('data-url');

            // Isi modal
            document.getElementById('modalNama').textContent  = nama;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalPesan').textContent = pesan;
            document.getElementById('modalWaktu').textContent = waktu;
            document.getElementById('modalStatus').innerHTML  = isRead === '1'
                ? '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">Dibaca</span>'
                : '<span class="px-2 py-1 text-xs rounded-full bg-pink-100 text-pink-600 font-semibold">Belum dibaca</span>';

            // Buka modal
            document.getElementById('pesanModal').classList.remove('hidden');

            // Auto mark read jika belum dibaca
            if (isRead === '0') {
                const token = document.querySelector('meta[name="csrf-token"]') 
                    ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    : '{{ csrf_token() }}';

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ _method: 'PATCH' })
                }).then(function () {
                    // Update status di tabel
                    const statusCell = document.getElementById('status-' + id);
                    if (statusCell) {
                        statusCell.innerHTML = '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">Dibaca</span>';
                    }
                    // Hapus background pink
                    const row = document.getElementById('row-' + id);
                    if (row) row.classList.remove('bg-pink-50');
                    // Update modal status
                    document.getElementById('modalStatus').innerHTML =
                        '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">Dibaca</span>';
                    // Update data-isread agar tidak dikirim ulang
                    btn.setAttribute('data-isread', '1');
                });
            }
        });
    });

    // ===== TUTUP MODAL =====
    document.getElementById('pesanModal').addEventListener('click', function (e) {
        if (e.target === this) tutupModal();
    });

    // ===== SEARCH =====
    document.getElementById('searchInput').addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('.pesan-row');
        let found = 0;

        rows.forEach(function (row) {
            const nama  = row.querySelector('.pesan-nama').textContent.toLowerCase();
            const email = row.querySelector('.pesan-email').textContent.toLowerCase();
            if (nama.includes(keyword) || email.includes(keyword)) {
                row.classList.remove('hidden');
                found++;
            } else {
                row.classList.add('hidden');
            }
        });

        document.getElementById('emptySearch').classList.toggle('hidden', found > 0);
    });

    // ===== HAPUS =====
    document.querySelectorAll('.btn-delete').forEach(function (button) {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus pesan?',
                text: 'Data ini akan terhapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
            }).then(function (result) {
                if (result.isConfirmed) form.submit();
            });
        });
    });

});

function tutupModal() {
    document.getElementById('pesanModal').classList.add('hidden');
}
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@endsection