<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
     $fakultas = Fakultas::all();
    return view('fakultas.index', compact('fakultas'));
}

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_fakultas', 'public');
        }

        Fakultas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
    }

    public function show(string $id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $fakultas = Fakultas::findOrFail($id);
    return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $fakultas = Fakultas::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($fakultas->gambar && Storage::exists('public/' . $fakultas->gambar)) {
                Storage::delete('public/' . $fakultas->gambar);
            }

            $gambarPath = $request->file('gambar')->store('gambar_fakultas', 'public');
            $fakultas->gambar = $gambarPath;
        }

        $fakultas->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fakultas->gambar,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
     {
        $fakultas = Fakultas::findOrFail($id);

        if ($fakultas->gambar && Storage::exists('public/' . $fakultas->gambar)) {
            Storage::delete('public/' . $fakultas->gambar);
        }

        $fakultas->delete();

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus.');
    }
}