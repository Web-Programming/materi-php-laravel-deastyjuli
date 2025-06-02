<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // protected $mahasiswa = [
    //     [
    //         'id' => 1,
    //         'nama' => 'Muhammad Irfan',
    //         'npm' => '2428250051',
    //         'prodi' => 'Teknik Informatika'
    //     ],
    //     [
    //         'id' => 2,
    //         'nama' => 'Bombardilo Crocodilo',
    //         'npm' => '2428250055',
    //         'prodi' => 'Sistem Informasi'
    //     ],
    //     [
    //         'id' => 3,
    //         'nama' => 'tung tung tung sahur',
    //         'npm' => '2428250041',
    //         'prodi' => 'Teknik Elektro'
    //     ]
    // ];
    public function index()
     {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|unique:mahasiswas',
            'prodi' => 'required|string|max:255',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
  public function detail($id)
    {
    }
       public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|unique:mahasiswas,npm,' . $id,
            'prodi' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
   {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
    
}