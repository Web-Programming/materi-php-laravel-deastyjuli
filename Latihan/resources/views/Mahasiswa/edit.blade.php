@extends('Layout.master')

@section('header')
<h3>Detail Mahasiswa</h3>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>NPM:</strong> {{ $mahasiswa->npm }}</p>
        <p><strong>Nama Mahasiswa:</strong> {{ $mahasiswa->nama }}</p>
        <p><strong>Program Studi:</strong> {{ $mahasiswa->prodi->kode_prodi ?? '-' }} - {{ $mahasiswa->prodi->nama ?? '-' }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection