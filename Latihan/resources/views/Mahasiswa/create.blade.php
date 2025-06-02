@extends('Layout.master')

@section('header')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6"><h3 class="mb-0">Mahasiswa</h3></div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="app-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Mahasiswa</h3>
            <div class="card-tools">
              <a href="{{ route('mahasiswa.create') }}" class="btn btn-success btn-sm">Tambah Mahasiswa</a>
            </div>
          </div>
          <div class="card-body">

            @if(session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif

            <table class="table table-bordered mt-2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Prodi</th>
                  <th>NPM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listmahasiswa as $mahasiswa)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->prodi->kode_prodi ?? '-' }}</td>
                    <td>{{ $mahasiswa->npm }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>
                      <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach

                @if($listmahasiswa->isEmpty())
                  <tr>
                    <td colspan="5" class="text-center">Data mahasiswa tidak tersedia.</td>
                  </tr>
                @endif
              </tbody>
            </table>

          </div>
          <div class="card-footer">Footer</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection