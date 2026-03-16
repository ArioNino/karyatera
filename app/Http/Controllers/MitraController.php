<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::orderBy('urutan')->get();
        return view('atmin.mitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('atmin.mitra.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $logoPath = $request->file('logo')->store('mitra', 'public');

        Mitra::create([
            'nama'   => $request->nama,
            'logo'   => $logoPath,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.mitra')->with('success', 'Mitra berhasil ditambahkan.');
    }

    public function edit(Mitra $mitra)
    {
        return view('atmin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'logo'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $data = [
            'nama'   => $request->nama,
            'urutan' => $request->urutan ?? 0,
        ];

        if ($request->hasFile('logo')) {
            if ($mitra->logo) {
                Storage::disk('public')->delete($mitra->logo);
            }
            $data['logo'] = $request->file('logo')->store('mitra', 'public');
        }

        $mitra->update($data);

        return redirect()->route('admin.mitra')->with('success', 'Mitra berhasil diperbarui.');
    }

    public function destroy(Mitra $mitra)
    {
        if ($mitra->logo) {
            Storage::disk('public')->delete($mitra->logo);
        }
        $mitra->delete();

        return redirect()->route('admin.mitra')->with('success', 'Mitra berhasil dihapus.');
    }
}