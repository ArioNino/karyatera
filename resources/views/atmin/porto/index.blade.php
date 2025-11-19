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

            {{-- FIX: Tampilkan gambar default jika kosong --}}
            <img src="{{ $portofolio->gambar
                ? asset('storage/' . $portofolio->gambar)
                : asset('images/default.jpg') }}"
                class="w-full h-48 object-cover"
                alt="{{ $portofolio->nama_portofolio }}">

            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i data-feather="layers" class="text-pink-500"></i>
                    {{ $portofolio->nama_portofolio }}
                </h3>

                {{-- FIX: ubah nama_kategori menjadi kategori --}}
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i data-feather="tag" class="text-blue-500"></i>
                    {{ $portofolio->kategori }}
                </h3>

                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2 break-all">
                    <i data-feather="link" class="text-green-500"></i>
                    {{ $portofolio->link }}
                </h3>

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
