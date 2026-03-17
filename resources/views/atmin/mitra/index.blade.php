@extends('layout.admin')

@section('title', 'Manajemen Mitra')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold gradient-text flex items-center gap-2">
            <i data-feather="star"></i> Manajemen Mitra
        </h2>
        <p class="text-gray-500 text-sm">Kelola logo perusahaan mitra KaryaTera</p>
    </div>
    <a href="{{ route('admin.mitra.create') }}"
       class="btn-primary text-white px-5 py-2.5 rounded-lg shadow-md flex items-center gap-2 transition">
        <i data-feather="plus-circle"></i> Tambah Mitra
    </a>
</div>

{{-- Search --}}
<div class="mb-4 flex items-center gap-3">
    <input type="text" id="searchInput" placeholder="Cari nama mitra..."
        class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none text-sm">
    <span class="text-sm text-gray-500">
        Menampilkan <span id="visibleCount">{{ $mitras->count() }}</span> data
    </span>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 w-10">#</th>
                <th class="px-4 py-3">Logo</th>
                <th class="px-4 py-3">Nama Mitra</th>
                <th class="px-4 py-3">Urutan</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="mitraBody">
            @forelse ($mitras as $mitra)
                <tr class="border-t hover:bg-gray-50 transition mitra-row"
                    data-nama="{{ strtolower($mitra->nama) }}">
                    <td class="px-4 py-3 text-gray-500 row-number">-</td>
                    <td class="px-4 py-3">
                        <img src="{{ asset('storage/' . $mitra->logo) }}"
                            class="h-10 w-auto object-contain"
                            alt="{{ $mitra->nama }}">
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-800 mitra-nama">{{ $mitra->nama }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $mitra->urutan }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.mitra.edit', $mitra) }}"
                               class="flex items-center gap-1 px-3 py-1.5 text-xs rounded-lg bg-yellow-400 text-white hover:bg-yellow-500 transition">
                                <i data-feather="edit-3" class="w-3 h-3"></i> Edit
                            </a>
                            <form action="{{ route('admin.mitra.destroy', $mitra) }}" method="POST" class="delete-form">
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
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada mitra.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<p id="emptySearch" class="text-center text-gray-400 mt-4 hidden">Tidak ada mitra yang cocok.</p>

{{-- PAGINATION --}}
<div class="flex items-center justify-between mt-4">
    <span class="text-sm text-gray-500">
        Halaman <span id="currentPage">1</span> dari <span id="totalPages">1</span>
    </span>
    <div class="flex gap-2" id="paginationButtons"></div>
</div>

<script>
const ROWS_PER_PAGE = 7;
let currentPage = 1;
let filteredRows = [];

function getAllRows() {
    return Array.from(document.querySelectorAll('.mitra-row'));
}

function applyFilter() {
    const keyword = document.getElementById('searchInput').value.toLowerCase();
    filteredRows = getAllRows().filter(row => {
        return row.getAttribute('data-nama').includes(keyword);
    });
    currentPage = 1;
    renderPage();
}

function renderPage() {
    const allRows = getAllRows();
    allRows.forEach(row => row.classList.add('hidden'));

    const totalPages = Math.max(1, Math.ceil(filteredRows.length / ROWS_PER_PAGE));
    const start = (currentPage - 1) * ROWS_PER_PAGE;
    const end = start + ROWS_PER_PAGE;
    const pageRows = filteredRows.slice(start, end);

    pageRows.forEach((row, i) => {
        row.classList.remove('hidden');
        row.querySelector('.row-number').textContent = start + i + 1;
    });

    document.getElementById('emptySearch').classList.toggle('hidden', filteredRows.length > 0);
    document.getElementById('visibleCount').textContent = filteredRows.length;
    document.getElementById('currentPage').textContent = currentPage;
    document.getElementById('totalPages').textContent = totalPages;

    renderPagination(totalPages);
    feather.replace();
}

function renderPagination(totalPages) {
    const container = document.getElementById('paginationButtons');
    container.innerHTML = '';

    const prev = document.createElement('button');
    prev.textContent = '←';
    prev.className = `px-3 py-1.5 text-sm rounded-lg border transition ${currentPage === 1 ? 'text-gray-300 border-gray-200 cursor-not-allowed' : 'text-pink-600 border-pink-400 hover:bg-pink-50'}`;
    prev.disabled = currentPage === 1;
    prev.onclick = () => { if (currentPage > 1) { currentPage--; renderPage(); } };
    container.appendChild(prev);

    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = `px-3 py-1.5 text-sm rounded-lg border transition ${i === currentPage ? 'bg-pink-500 text-white border-pink-500' : 'text-gray-600 border-gray-300 hover:bg-pink-50'}`;
        btn.onclick = ((page) => () => { currentPage = page; renderPage(); })(i);
        container.appendChild(btn);
    }

    const next = document.createElement('button');
    next.textContent = '→';
    next.className = `px-3 py-1.5 text-sm rounded-lg border transition ${currentPage === totalPages ? 'text-gray-300 border-gray-200 cursor-not-allowed' : 'text-pink-600 border-pink-400 hover:bg-pink-50'}`;
    next.disabled = currentPage === totalPages;
    next.onclick = () => { if (currentPage < totalPages) { currentPage++; renderPage(); } };
    container.appendChild(next);
}

document.getElementById('searchInput').addEventListener('input', applyFilter);

document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
        let form = this.closest('form');
        Swal.fire({
            title: 'Hapus mitra?',
            text: 'Data ini akan terhapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
        }).then(result => { if (result.isConfirmed) form.submit(); });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    filteredRows = getAllRows();
    renderPage();
});
</script>

@if(session('success'))
<script>
Swal.fire({ icon: 'success', title: 'Berhasil!', text: '{{ session('success') }}', timer: 2000, showConfirmButton: false });
</script>
@endif

@endsection