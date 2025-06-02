@extends('layout.master')

@section('title', "Halaman Create Fakultas")

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Fakultas</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url("/fakultas") }}">Fakultas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Fakultas</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->

<div class="app-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Fakultas</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('/fakultas') }}" method="post">
              @csrf

              <!-- Input Nama Fakultas -->
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Fakultas</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                @error('nama')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <button type="submit" class="btn btn-success">Simpan</button>
            </form>
          </div>
          <div class="card-footer">Footer</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection