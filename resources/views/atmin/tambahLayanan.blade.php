@extends('layout.admin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Layanan</h2>

    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div>
            <label class="block text-gray-600 font-medium mb-2">Nama Layanan</label>
            <input type="text" name="nama" placeholder="Masukkan nama layanan"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" placeholder="Masukkan deskripsi layanan"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none"></textarea>
        </div>

        <div>
            <label class="block text-gray-600 font-medium mb-2">Gambar</label>
            <input type="file" name="gambar" accept="image/*"
                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none">
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
@endsection
