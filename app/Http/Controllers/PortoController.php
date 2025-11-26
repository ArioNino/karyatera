<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortoController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('atmin.porto.index', compact('portofolios'));
    }

    public function create()
    {
        return view('atmin.porto.tambah');
    }

    public function portofolio()
    {
        $portofolios = Portofolio::all();
        return view('portofolio', compact('portofolios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_portofolio' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'link' => [
                'required',
                'regex:#^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[A-Za-z0-9_\-]+(\?.*)?$#'
            ],
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'link.regex' => 'Link YouTube tidak valid. Gunakan link resmi YouTube.',
            'link.required' => 'Link wajib diisi.',
        ]);

        $gambarPath = $request->file('gambar') ? $request->file('gambar')->store('portofolio', 'public') : null;

        Portofolio::create([
            'nama_portofolio' => $request->nama_portofolio,
            'kategori' => $request->kategori,
            'link' => $request->link,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.porto')->with('success', 'portofolio berhasil ditambahkan.');
    }

    public function edit(Portofolio $portofolio)
    {
        return view('atmin.porto.edit', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $validated = $request->validate([
            'nama_portofolio' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'link' => 'required|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }

            // Upload gambar baru
            $validated['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        // Update data
        $portofolio->update($validated);

        return redirect()->route('admin.porto')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }


    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->gambar) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        $portofolio->delete();

        return redirect()->route('admin.porto')->with('success', 'portofolio berhasil dihapus.');
    }
}
