<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //     protected $prodi = [
    //     [
    //         'id' => 1,
    //         'nama' => 'Teknik Informatika',
    //         'kaprodi' => 'Dr. M. Rizky Pribadi, M.Kom',
    //         'fakultas' => 'Ilmu Komputer & Rekayasa',
    //         'akreditasi' => 'B'
    //     ],
    //     [
    //         'id' => 2,
    //         'nama' => 'Sistem Informasi',
    //         'kaprodi' => 'Ahmad Farisi, M.Kom',
    //         'fakultas' => 'Ilmu Komputer & Rekayasa',
    //         'akreditasi' => 'B'
    //     ],
    //     [
    //         'id' => 3,
    //         'nama' => 'Teknik Elektro',
    //         'kaprodi' => 'Eka Puji Widiyanto, S.T., M.Kom',
    //         'fakultas' => 'Ilmu Komputer & Rekayasa',
    //         'akreditasi' => 'C'
    //     ],
    //     [
    //         'id' => 4,
    //         'nama' => 'Menejemen Informatika',
    //         'kaprodi' => 'Dicky Pratama, S.Kom., M.T.I',
    //         'fakultas' => 'Ilmu Komputer & Rekayasa',
    //         'akreditasi' => 'B'
    //     ],
    //     [
    //         'id' => 5,
    //         'nama' => 'Akuntansi',
    //         'kaprodi' => 'Dr. Siti Khairani, S.E.Ak., M.SiI',
    //         'fakultas' => 'Ekonomi & Bisnis',
    //         'akreditasi' => 'B'
    //     ],
    //     [
    //         'id' => 6,
    //         'nama' => 'Menejemen',
    //         'kaprodi' => 'Idham Cholid, S.E., M.E',
    //         'fakultas' => 'Ekonomi & Bisnis',
    //         'akreditasi' => 'B'
    //     ],
    // ];

        public function index()
    {
        $prodi = Prodi::all();
        return view('prodi.index', compact('prodi'));
    }
    /**
     * Show the form for creating a new resource.
     */
    
    public function create(Request $request)
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:255',
            'kaprodi' => 'nullable|string|max:255',
            'akreditasi' => 'nullable|string|max:10',
            'fakultas' => 'required|string|max:255',
        ]);

        Prodi::create($request->all());

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {

    }

    public function show(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'nama' => 'required|string|max:255',
            'kaprodi' => 'nullable|string|max:255',
            'akreditasi' => 'nullable|string|max:10',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->all());

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil dihapus.');
    }
    }