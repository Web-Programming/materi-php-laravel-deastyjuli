@extends('layout.master')

@section('title', 'Tambah Dosen')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-danger">Tambah Dosen Baru</h1>

        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dosen</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama dosen" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi dosen"></textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Dosen</label>
                <input type="file" name="gambar" class="form-control" id="gambar">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
</main>
@endsection