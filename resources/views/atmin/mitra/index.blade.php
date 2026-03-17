@extends('layout.admin')

@section('title', 'Manajemen Mitra')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold gradient-text flex items-center gap-2">
            <i data-feather="star"></i> Manajemen Mitra
        </h2>
        <p class="text-gray-500 text-sm">Kelola logo perusahaan mitra KaryaTera</p>
    </div>
    <a href="{{ route('admin.mitra.create') }}"
       class="btn-primary text-white px-5 py-2.5 rounded-lg shadow-md flex items-center gap-2 transition">
        <i data-feather="plus-circle"></i> Tambah Mitra
    </a>
</div>

{{-- Search --}}
<div class="mb-4">
    <input type="text" id="searchInput" placeholder="Cari nama mitra..."
        class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 outline-none text-sm">
</div>

{{-- Tabel --}}
<div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Logo</th>
                <th class="px-4 py-3">Nama Mitra</th>
                <th class="px-4 py-3">Urutan</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mitras as $index => $mitra)
                <tr class="border-t hover:bg-gray-50 transition mitra-row">
                    <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">
                        <img src="{{ asset('storage/' . $mitra->logo) }}"
                            class="h-10 w-auto object-contain"
                            alt="{{ $mitra->nama }}">
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-800 mitra-nama">{{ $mitra->nama }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $mitra->urutan }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.mitra.edit', $mitra) }}"
                               class="flex items-center gap-1 px-3 py-1.5 text-xs rounded-lg bg-yellow-400 text-white hover:bg-yellow-500 transition">
                                <i data-feather="edit-3" class="w-3 h-3"></i> Edit
                            </a>
                            <form action="{{ route('admin.mitra.destroy', $mitra) }}" method="POST" class="delete-form">
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
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada mitra.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<p id="emptySearch" class="text-center text-gray-400 mt-4 hidden">Tidak ada mitra yang cocok.</p>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll('.mitra-row');
    let found = 0;
    rows.forEach(row => {
        const nama = row.querySelector('.mitra-nama').textContent.toLowerCase();
        if (nama.includes(keyword)) { row.classList.remove('hidden'); found++; }
        else row.classList.add('hidden');
    });
    document.getElementById('emptySearch').classList.toggle('hidden', found > 0);
});

document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
        let form = this.closest('form');
        Swal.fire({
            title: 'Hapus mitra?',
            text: 'Data ini akan terhapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
        }).then(result => { if (result.isConfirmed) form.submit(); });
    });
});
</script>

@if(session('success'))
<script>
Swal.fire({ icon: 'success', title: 'Berhasil!', text: '{{ session('success') }}', timer: 2000, showConfirmButton: false });
</script>
@endif

@endsection