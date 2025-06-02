@extends('Layout.master')

@section('header')
<h3>Tambah Mahasiswa</h3>
@endsection

@section('content')
<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="npm" class="form-label">NPM</label>
        <input type="text" name="npm" id="npm" class="form-control" value="{{ old('npm') }}" required>
        @error('npm')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="prodi_id" class="form-label">Program Studi</label>
        <select name="prodi_id" id="prodi_id" class="form-select" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->kode_prodi }} - {{ $prodi->nama }}
                </option>
            @endforeach
        </select>
        @error('prodi_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection