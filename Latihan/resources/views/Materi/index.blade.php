@extends('Layout.master')

@section('header')
<h3>Edit Materi</h3>
@endsection

@section('content')
<form action="{{ route('materi.update', $materi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="kode_materi" class="form-label">Kode Materi</label>
        <input type="text" name="kode_materi" id="kode_materi" class="form-control" value="{{ old('kode_materi', $materi->kode_materi) }}" required>
        @error('kode_materi')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="nama_materi" class="form-label">Nama Materi</label>
        <input type="text" name="nama_materi" id="nama_materi" class="form-control" value="{{ old('nama_materi', $materi->nama_materi) }}" required>
        @error('nama_materi')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="dosen_id" class="form-label">Dosen</label>
        <select name="dosen_id" id="dosen_id" class="form-select" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ (old('dosen_id', $materi->dosen_id) == $dosen->id) ? 'selected' : '' }}>
                    {{ $dosen->kode_dosen }} - {{ $dosen->nama }}
                </option>
            @endforeach
        </select>
        @error('dosen_id')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection