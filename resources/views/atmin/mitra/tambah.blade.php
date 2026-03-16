@extends('layout.admin')

@section('title', 'Tambah Mitra')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-white p-6 rounded-2xl shadow-md max-w-xl">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Mitra</h2>

    <form action="{{ route('admin.mitra.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Mitra</label>
            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Gojek"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', 0) }}" min="0"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            <p class="text-xs text-gray-400 mt-1">Angka lebih kecil tampil lebih awal</p>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Logo Mitra</label>
            <div class="flex gap-6 items-start">
                <div class="border rounded-xl p-2 w-40 h-24 flex items-center justify-center overflow-hidden bg-gray-50">
                    <img id="preview" src="" class="h-full w-auto object-contain hidden">
                    <p id="noPreview" class="text-gray-400 text-sm">Preview</p>
                </div>
                <label for="logo" class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-100 transition">
                    <svg class="w-8 h-8 mb-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Klik atau Drop logo disini</p>
                    <input id="logo" type="file" name="logo" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>
            </div>
            @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.mitra') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition">Simpan</button>
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
    img.onload = function() { URL.revokeObjectURL(img.src); }
}
</script>

@endsection