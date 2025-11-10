@extends('layout.admin')

@section('title', 'Edit Layanan')

@section('content')

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Layanan</h2>

    <form action="{{ route('admin.layanan.update', $layanan) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Nama Layanan --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            @error('nama_layanan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Gambar Layanan</label>
            <div class="flex gap-6 items-start">
                <!-- Preview lama / baru -->
                <div class="border rounded-xl p-2 w-48 h-48 flex items-center justify-center overflow-hidden bg-gray-50">
                    <img id="preview" src="{{ $layanan->gambar ? asset('storage/' . $layanan->gambar) : '' }}"
                         class="object-cover w-full h-full {{ $layanan->gambar ? '' : 'hidden' }}">
                    <p id="noPreview" class="text-gray-400 text-sm {{ $layanan->gambar ? 'hidden' : '' }}">Preview</p>
                </div>

                <!-- Upload baru -->
                <label for="gambar" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-100 transition">
                    <svg class="w-10 h-10 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Klik atau Drop gambar baru</p>
                    <input id="gambar" type="file" name="gambar" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>
            </div>
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.layanan') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition">Update</button>
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

<!-- SweetAlert2 Notifikasi Sukses -->
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
