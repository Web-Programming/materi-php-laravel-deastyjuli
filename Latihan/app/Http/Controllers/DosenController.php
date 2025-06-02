<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // protected $dosen = [
    // [
    //     'id' => 1,
    //     'nama' => 'Nur Rachmat, M.Kom',
    //     'gambar' => 'dosen1.jpg',
    //     'deskripsi' => 'S2 Universitas Sriwijaya – Magister Informatika'
    // ],
    // [
    //     'id' => 2,
    //     'nama' => 'Derry Alamsyah, S.Si, M.Kom, M.Pd',
    //     'gambar' => 'dosen2.jpg',
    //     'deskripsi' => 'S2 Universitas Indonesia – Magister Ilmu Komputer'
    // ],
    // [
    //     'id' => 3,
    //     'nama' => 'Tinaliah, M.Kom',
    //     'gambar' => 'dosen3.jpg',
    //     'deskripsi' => 'S2 Universitas Indonesia – Magister Ilmu Komputer'
    // ],
    // [
    //     'id' => 2,
    //     'nama' => 'Siska Devella, M.Kom',
    //     'gambar' => 'dosen4.jpg',
    //     'deskripsi' => 'S2 Universitas Indonesia – Magister Ilmu Komputer'
    // ],
    // ];

    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dosen.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $gambarPath = null;
        if($request->hasFile('gambar')){
            $gambarPath = $request->file('gambar')->store('gambar_dosen','public');
        }

        Dosen::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('dosen.index')->with('succses','Dosen berhasil di tambahkan.');
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
          $dosen = Dosen::findOrFail($id);
    return view('dosen.edit', compact('dosen'));
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

        $dosen = Dosen::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($dosen->gambar && Storage::exists('public/' . $dosen->gambar)) {
                Storage::delete('public/' . $dosen->gambar);
            }

            $gambarPath = $request->file('gambar')->store('gambar_fakultas', 'public');
            $dosen->gambar = $gambarPath;
        }

        $dosen->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $dosen->gambar,
        ]);

        return redirect()->route('dosen.index')->with('success', 'dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        if ($dosen->gambar && Storage::exists('public/' . $dosen->gambar)) {
            Storage::delete('public/' . $dosen->gambar);
        }

        $dosen->delete();

        return redirect()->route('fakultas.index')->with('success', 'Dosen berhasil dihapus.');
    }
}