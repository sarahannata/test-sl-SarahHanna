<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::latest()->paginate(10);
        return view('divisi.index', compact('divisis'));
    }

    public function create()
    {
        return view('divisi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nama_divisi' => 'required|string|max:255|unique:divisis']);
        Divisi::create($validated);
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan!');
    }

    public function edit(Divisi $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }

    public function update(Request $request, Divisi $divisi)
    {
        $validated = $request->validate(['nama_divisi' => 'required|string|max:255|unique:divisis,nama_divisi,' . $divisi->id]);
        $divisi->update($validated);
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui!');
    }

    public function destroy(Divisi $divisi)
    {
        // Pengecekan ini akan aktif setelah kita menghubungkan ke Pegawai
        if ($divisi->pegawai()->exists()) {
            return back()->with('error', 'Divisi tidak bisa dihapus karena masih digunakan oleh pegawai.');
        }
        $divisi->delete();
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus!');
    }
}
