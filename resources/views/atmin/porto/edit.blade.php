@extends('layout.admin')

@section('title', 'Edit Portofolio')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Portofolio</h2>

    <form action="{{ route('admin.porto.update', $porto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Nama Portofolio --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Portofolio</label>
            <input type="text" name="nama_portofolio"
                value="{{ old('nama_portofolio', $porto->nama_portofolio) }}"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            @error('nama_portofolio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kategori Dropdown --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Kategori</label>
            <select name="kategori"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
                <option value="">-- Pilih Kategori --</option>
                <option value="Fotografi" {{ old('kategori', $porto->kategori) == 'Fotografi' ? 'selected' : '' }}>Fotografi</option>
                <option value="Videografi" {{ old('kategori', $porto->kategori) == 'Videografi' ? 'selected' : '' }}>Videografi</option>
                <option value="Desain Grafis" {{ old('kategori', $porto->kategori) == 'Desain Grafis' ? 'selected' : '' }}>Desain Grafis</option>
                <option value="Branding" {{ old('kategori', $porto->kategori) == 'Branding' ? 'selected' : '' }}>Branding</option>
                <option value="Lainnya" {{ old('kategori', $porto->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Link --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Link</label>
            <input type="url" name="link"
                value="{{ old('link', $porto->link) }}"
                placeholder="https://contoh.com"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
            @error('link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block text-gray-600 font-medium mb-2">Gambar Portofolio</label>
            <div class="flex gap-6 items-start">

                {{-- Preview --}}
                <div class="border rounded-xl p-2 w-48 h-48 flex items-center justify-center overflow-hidden bg-gray-50">
                    <img id="preview"
                         src="{{ $porto->gambar ? asset('storage/porto/' . $porto->gambar) : '' }}"
                         class="object-cover w-full h-full {{ $porto->gambar ? '' : 'hidden' }}">

                    @if(!$porto->gambar)
                        <p id="noPreview" class="text-gray-400 text-sm">Preview</p>
                    @else
                        <p id="noPreview" class="hidden"></p>
                    @endif
                </div>

                {{-- Upload --}}
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
            <a href="{{ route('admin.porto') }}"
                class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition mr-2">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition">
                Update
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
    };
}
</script>

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
