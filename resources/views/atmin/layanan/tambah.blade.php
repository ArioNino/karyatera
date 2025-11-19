@extends('layout.admin')

@section('title', 'Tambah Layanan')

@section('content')

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Layanan</h2>

    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" placeholder="Masukkan nama layanan"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            @error('nama_layanan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" placeholder="Masukkan deskripsi layanan"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">{{ old('deskripsi') }}</textarea>
        </div>

        {{-- UPLOAD GAMBAR --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Gambar</label>

            <div class="flex gap-6 items-start">
                <!-- Dropzone -->
                <div class="border rounded-xl p-2 w-40 h-40 flex items-center justify-center overflow-hidden bg-gray-50">
                    <img id="preview" src="" class="object-cover w-full h-full hidden">
                    <p id="noPreview" class="text-gray-400 text-sm">Preview</p>
                </div>
                <label for="gambar"
                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-100 transition">
                    <svg class="w-10 h-10 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Klik atau Drop gambar disini</p>
                    <input id="gambar" type="file" name="gambar" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>

                <!-- Preview -->
            </div>

        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.layanan') }}"
                class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition mr-2">Batal</a>

            <button type="submit"
                class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition">
                Simpan
            </button>
        </div>

    </form>
</div>

<script>
function previewImage(event) {
    let img = document.getElementById('preview');
    let noPreview = document.getElementById('noPreview');

    img.src = URL.createObjectURL(event.target.files[0]);
    img.classList.remove('hidden');
    noPreview.classList.add('hidden');
    img.onload = function() {
        URL.revokeObjectURL(img.src);
    }
}
</script>

<!-- SweetAlert Sukses -->
@if(session('success'))
<script>
Swal.fire({
    icon: "success",
    title: "Berhasil!",
    text: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2000
});
</script>
@endif

@endsection
