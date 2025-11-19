@extends('layout.admin')

@section('title', 'Manajemen Portofolio')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-between items-center mb-10">
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

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($portofolios as $portofolio)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">

            {{-- Gambar membuka modal video --}}
            <div onclick="openVideo('{{ $portofolio->link }}')">
                <img src="{{ $portofolio->gambar
                    ? asset('storage/' . $portofolio->gambar)
                    : asset('images/default.jpg') }}"
                     class="w-full h-48 object-cover cursor-pointer hover:opacity-90 transition"
                     alt="{{ $portofolio->nama_portofolio }}">
            </div>

            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i data-feather="layers" class="text-pink-500"></i>
                    {{ $portofolio->nama_portofolio }}
                </h3>

                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i data-feather="tag" class="text-blue-500"></i>
                    {{ $portofolio->kategori }}
                </h3>

                {{-- Link disembunyikan (tidak ditampilkan) --}}

                <div class="mt-4 flex gap-4">
                    <a href="{{ route('admin.porto.edit', $portofolio) }}"
                       class="flex items-center gap-2 px-4 py-2 text-sm rounded-lg bg-yellow-400 text-white hover:bg-yellow-500 transition">
                        <i data-feather="edit-3" class="w-4 h-4"></i> Edit
                    </a>

                    <form action="{{ route('admin.porto.destroy', $portofolio) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                                class="btn-delete flex items-center gap-2 px-4 py-2 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                            <i data-feather="trash-2" class="w-4 h-4"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-500 col-span-3 text-center">Belum ada Portofolio.</p>
    @endforelse
</div>

{{-- ===================== MODAL VIDEO ===================== --}}
<div id="videoModal"
     class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center hidden z-50 px-4">
    <div class="bg-white p-4 rounded-xl shadow-xl max-w-3xl w-full relative">

        <!-- Tombol Close -->
        <button onclick="closeVideo()"
                class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full p-2">
            ✕
        </button>

        <!-- Konten Modal: iframe + fallback -->
        <div id="videoContainer" class="w-full">
            <div class="aspect-w-16 aspect-h-9">
                <iframe id="videoFrame"
                        class="w-full h-96 rounded-lg"
                        src=""
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                </iframe>
            </div>

            <!-- Pesan fallback (tampil selalu agar user bisa buka di YouTube bila embed gagal) -->
            <div class="mt-3 flex items-center justify-between">
                <p class="text-sm text-gray-600" id="videoNote">Jika video tidak bisa diputar di sini, silakan buka di YouTube.</p>
                <div class="flex gap-2">
                    <a id="openOnYouTube" href="#" target="_blank" class="px-3 py-1.5 rounded-md bg-blue-600 text-white text-sm hover:bg-blue-700 transition">Buka di YouTube</a>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- ===================== SCRIPT DELETE + VIDEO ===================== --}}
<script>
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
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

// ================= VIDEO FUNCTION =================

// Ambil ID YouTube dari berbagai format URL
function extractYouTubeID(url) {
    if (!url) return null;
    // cleanup
    url = url.trim();

    // Patterns to match:
    // - https://www.youtube.com/watch?v=VIDEO_ID
    // - https://youtu.be/VIDEO_ID
    // - https://www.youtube.com/embed/VIDEO_ID
    // - v=VIDEO_ID in query
    const regExp = /(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|.*[?&]v=)|youtu\.be\/)([A-Za-z0-9_-]{11})/;
    const match = url.match(regExp);
    if (match && match[1]) return match[1];

    // fallback: try parse query param v
    try {
        const u = new URL(url);
        const v = u.searchParams.get('v');
        if (v && v.length === 11) return v;
    } catch (e) {
        // not a valid URL
    }
    return null;
}

function openVideo(url) {
    const videoId = extractYouTubeID(url);

    // If it's a valid YouTube id, embed. Otherwise open in new tab.
    if (videoId) {
        const embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
        const iframe = document.getElementById('videoFrame');
        iframe.src = embedUrl;

        // set fallback link
        document.getElementById('openOnYouTube').href = 'https://www.youtube.com/watch?v=' + videoId;

        // show modal
        document.getElementById('videoModal').classList.remove('hidden');

        // small UX: if embedding is blocked by owner, user will see message inside iframe.
        // we keep fallback button for that case.
    } else {
        // Not a recognized YouTube URL — open directly in new tab
        if (url && url.startsWith('http')) {
            window.open(url, '_blank');
        } else {
            // nothing useful: inform user
            Swal.fire({
                icon: 'error',
                title: 'Tidak bisa memutar video',
                text: 'Link tidak valid atau bukan URL YouTube.',
            });
        }
    }
}

function closeVideo() {
    document.getElementById('videoFrame').src = '';
    document.getElementById('videoModal').classList.add('hidden');
}
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
