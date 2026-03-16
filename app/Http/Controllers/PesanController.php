<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->get();
        return view('atmin.pesan.index', compact('pesans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Pesan::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dihapus.');
    }

    public function markRead(Pesan $pesan)
    {
        $pesan->update(['is_read' => true]);
        return redirect()->route('admin.pesan')->with('success', 'Pesan ditandai sudah dibaca.');
    }
}