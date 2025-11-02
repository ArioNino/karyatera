@extends('layout.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Layanan</h2>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Layanan</label>
            <input type="text" name="nama" value="{{ old('nama', $layanan->nama) }}"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Gambar Saat Ini</label>
            @if ($layanan->gambar)
                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar layanan"
                    class="w-48 h-32 object-cover rounded-lg mb-3">
            @else
                <p class="text-gray-500 italic">Belum ada gambar</p>
            @endif

            <label class="block text-gray-600 font-medium mb-2">Ganti Gambar</label>
            <input type="file" name="gambar" accept="image/*"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.layanan') }}"
                class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition mr-2">Batal</a>
            <button type="submit"
                class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
