@extends('layout.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-bold gradient-text flex items-center gap-2">
            <i data-feather="briefcase"></i> Manajemen Layanan
        </h2>
        <p class="text-gray-500 text-sm">Kelola layanan visual storytelling KaryaTera</p>
    </div>
    <a href="{{ route('admin.layanan.create') }}" class="btn-primary text-white px-5 py-2.5 rounded-lg shadow-md flex items-center gap-2 transition">
        <i data-feather="plus-circle"></i> Tambah Layanan
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($layanans as $layanan)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
            <img src="{{ asset('storage/' . $layanan->gambar) }}" class="w-full h-48 object-cover" alt="{{ $layanan->nama }}">
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i data-feather="layers" class="text-pink-500"></i> {{ $layanan->nama }}
                </h3>
                <p class="text-sm text-gray-600 mt-2">{{ $layanan->deskripsi }}</p>
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="flex items-center gap-2 px-4 py-2 text-sm rounded-lg bg-yellow-400 text-white hover:bg-yellow-500 transition">
                        <i data-feather="edit-3" class="w-4 h-4"></i> Edit
                    </a>
                    <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="flex items-center gap-2 px-4 py-2 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                            <i data-feather="trash-2" class="w-4 h-4"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-500 col-span-3 text-center">Belum ada layanan.</p>
    @endforelse
</div>
@endsection
