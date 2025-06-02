@extends('Layout.master')

@section('header')
<h3>Detail Materi</h3>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Kode Materi:</strong> {{ $materi->kode_materi }}</p>
        <p><strong>Nama Materi:</strong> {{ $materi->nama_materi }}</p>
        <p><strong>Dosen:</strong> {{ $materi->dosen->kode_dosen ?? '-' }} - {{ $materi->dosen->nama ?? '-' }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('materi.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('materi.edit', $materi->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection