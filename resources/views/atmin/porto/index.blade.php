@extends('layout.admin')

@section('title', 'Manajemen Portofolio')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold gradient-text flex items-center gap-2">
            <i data-feather="briefcase"></i> Manajemen Portofolio
        </h2>
        <p class="text-gray-500 text-sm">Kelola Portofolio visual storytelling KaryaTera</p>
    </div>
    <a href="{{ route('admin.porto.create') }}"
       class="btn-primary text-white px-5 py-2.5 rounded-lg shadow-md flex items-center gap-2 transition">
        <i data-feather="plus-circle"></i> Tambah Portofolio
    </a>
</div>

{{-- Search & Filter --}}
<div class="flex flex-wrap gap-3 mb-4">
    <input type="text" id="searchInput" placeholder="Cari portofolio..."
        class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none text-sm">

    <select id="filterKategori"
        class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none text-sm">
        <option value="">Semua Kategori</option>
        @foreach ($portofolios->pluck('kategori')->unique()->filter() as $kat)
            <option value="{{ $kat }}">{{ $kat }}</option>
        @endforeach
    </select>

    <span class="text-sm text-gray-500 self-center">
        Menampilkan <span id="visibleCount">{{ $portofolios->count() }}</span> data
    </span>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 w-12">#</th>
                <th class="px-4 py-3">Thumbnail</th>
                <th class="px-4 py-3">Nama Portofolio</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody id="portoBody">
            @forelse ($portofolios as $portofolio)
                <tr class="border-t hover:bg-gray-50 transition porto-row"
                    data-nama="{{ strtolower($portofolio->nama_portofolio) }}"
                    data-kategori="{{ $portofolio->kategori }}">
                    <td class="px-4 py-3 text-gray-500 row-number">-</td>
                    <td class="px-4 py-3">
                        <img src="{{ $portofolio->gambar ? asset('storage/' . $portofolio->gambar) : asset('images/default.jpg') }}"
                            class="w-20 h-14 object-cover rounded-lg cursor-pointer hover:opacity-80 transition"
                            alt="{{ $portofolio->nama_portofolio }}"
                            onclick="openVideo('{{ $portofolio->link }}')">
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $portofolio->nama_portofolio }}
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-600 font-semibold">
                            {{ $portofolio->kategori }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.porto.edit', $portofolio) }}"
                               class="flex items-center gap-1 px-3 py-1.5 text-xs rounded-lg bg-yellow-400 text-white hover:bg-yellow-500 transition">
                                <i data-feather="edit-3" class="w-3 h-3"></i> Edit
                            </a>
                            <form action="{{ route('admin.porto.destroy', $portofolio) }}" method="POST" class="delete-form">
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
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada Portofolio.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<p id="emptySearch" class="text-center text-gray-400 mt-4 hidden">Tidak ada portofolio yang cocok.</p>

{{-- PAGINATION --}}
<div class="flex items-center justify-between mt-4">
    <span class="text-sm text-gray-500">
        Halaman <span id="currentPage">1</span> dari <span id="totalPages">1</span>
    </span>
    <div class="flex gap-2" id="paginationButtons"></div>
</div>

{{-- MODAL VIDEO --}}
<div id="videoModal"
     class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center hidden z-50 px-4">
    <div class="bg-white p-4 rounded-xl shadow-xl max-w-3xl w-full relative">
        <button onclick="closeVideo()"
                class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full p-2">✕</button>
        <iframe id="videoFrame"
                class="w-full h-96 rounded-lg"
                src=""
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        <div class="mt-3 flex items-center justify-between">
            <p class="text-sm text-gray-600">Jika video tidak bisa diputar, silakan buka di YouTube.</p>
            <a id="openOnYouTube" href="#" target="_blank"
               class="px-3 py-1.5 rounded-md bg-blue-600 text-white text-sm hover:bg-blue-700 transition">
               Buka di YouTube
            </a>
        </div>
    </div>
</div>

<script>
const ROWS_PER_PAGE = 10;
let currentPage = 1;
let filteredRows = [];

function getAllRows() {
    return Array.from(document.querySelectorAll('.porto-row'));
}

function applyFilter() {
    const keyword = document.getElementById('searchInput').value.toLowerCase();
    const kategori = document.getElementById('filterKategori').value.toLowerCase();

    filteredRows = getAllRows().filter(row => {
        const nama = row.getAttribute('data-nama');
        const kat = row.getAttribute('data-kategori').toLowerCase();
        return nama.includes(keyword) && (kategori === '' || kat === kategori);
    });

    currentPage = 1;
    renderPage();
}

function renderPage() {
    const allRows = getAllRows();

    // Hide all first
    allRows.forEach(row => row.classList.add('hidden'));

    const totalPages = Math.max(1, Math.ceil(filteredRows.length / ROWS_PER_PAGE));
    const start = (currentPage - 1) * ROWS_PER_PAGE;
    const end = start + ROWS_PER_PAGE;
    const pageRows = filteredRows.slice(start, end);

    // Show filtered rows for this page and renumber
    pageRows.forEach((row, i) => {
        row.classList.remove('hidden');
        row.querySelector('.row-number').textContent = start + i + 1;
    });

    // Empty state
    document.getElementById('emptySearch').classList.toggle('hidden', filteredRows.length > 0);
    document.getElementById('visibleCount').textContent = filteredRows.length;
    document.getElementById('currentPage').textContent = currentPage;
    document.getElementById('totalPages').textContent = totalPages;

    renderPagination(totalPages);
}

function renderPagination(totalPages) {
    const container = document.getElementById('paginationButtons');
    container.innerHTML = '';

    // Prev button
    const prev = document.createElement('button');
    prev.textContent = '←';
    prev.className = `px-3 py-1.5 text-sm rounded-lg border transition ${currentPage === 1 ? 'text-gray-300 border-gray-200 cursor-not-allowed' : 'text-pink-600 border-pink-400 hover:bg-pink-50'}`;
    prev.disabled = currentPage === 1;
    prev.onclick = () => { if (currentPage > 1) { currentPage--; renderPage(); } };
    container.appendChild(prev);

    // Page number buttons
    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = `px-3 py-1.5 text-sm rounded-lg border transition ${i === currentPage ? 'bg-pink-500 text-white border-pink-500' : 'text-gray-600 border-gray-300 hover:bg-pink-50'}`;
        btn.onclick = ((page) => () => { currentPage = page; renderPage(); })(i);
        container.appendChild(btn);
    }

    // Next button
    const next = document.createElement('button');
    next.textContent = '→';
    next.className = `px-3 py-1.5 text-sm rounded-lg border transition ${currentPage === totalPages ? 'text-gray-300 border-gray-200 cursor-not-allowed' : 'text-pink-600 border-pink-400 hover:bg-pink-50'}`;
    next.disabled = currentPage === totalPages;
    next.onclick = () => { if (currentPage < totalPages) { currentPage++; renderPage(); } };
    container.appendChild(next);
}

document.getElementById('searchInput').addEventListener('input', applyFilter);
document.getElementById('filterKategori').addEventListener('change', applyFilter);

// ===== HAPUS =====
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
        let form = this.closest('form');
        Swal.fire({
            title: "Hapus portofolio?",
            text: "Data ini akan terhapus permanen.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e11d48",
            cancelButtonColor: "#6b7280",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) form.submit();
        });
    });
});

// ===== VIDEO =====
function extractYouTubeID(url) {
    if (!url) return null;
    url = url.trim();
    const regExp = /(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|.*[?&]v=)|youtu\.be\/)([A-Za-z0-9_-]{11})/;
    const match = url.match(regExp);
    if (match && match[1]) return match[1];
    try {
        const u = new URL(url);
        const v = u.searchParams.get('v');
        if (v && v.length === 11) return v;
    } catch (e) {}
    return null;
}

function openVideo(url) {
    const videoId = extractYouTubeID(url);
    if (videoId) {
        document.getElementById('videoFrame').src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
        document.getElementById('openOnYouTube').href = 'https://www.youtube.com/watch?v=' + videoId;
        document.getElementById('videoModal').classList.remove('hidden');
    } else if (url && url.startsWith('http')) {
        window.open(url, '_blank');
    } else {
        Swal.fire({ icon: 'error', title: 'Link tidak valid', text: 'Bukan URL YouTube yang dikenali.' });
    }
}

function closeVideo() {
    document.getElementById('videoFrame').src = '';
    document.getElementById('videoModal').classList.add('hidden');
}

// Init
document.addEventListener('DOMContentLoaded', () => {
    filteredRows = getAllRows();
    renderPage();
});
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: "success",
    title: "Berhasil!",
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@endsection