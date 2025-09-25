<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::latest()->paginate(10);

        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        $divisis = Divisi::all();

        return view('pegawai.create', compact('jabatans', 'divisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan_id' => 'required|exists:jabatans,id',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $jabatans = Jabatan::all();
        $divisis = Divisi::all();

        return view('pegawai.edit', compact('pegawai', 'jabatans', 'divisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            // Aturan unique diupdate agar tidak error saat email tidak diubah
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan_id' => 'required|exists:jabatans,id',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        // 2. Update data di database
        $pegawai->update($validated);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        // 2. Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
