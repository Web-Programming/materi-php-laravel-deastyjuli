@extends('layout.master')

@section('title', "Halaman edit Fakultas")

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
                  <li class="breadcrumb-item active" aria-current="page">Update Fakultas</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->

        <h3>Edit Data Fakultas</h3>
        <form action="{{ route('fakultas.update',$listfakultas->id)}}"
            method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="">Nama Fakultas :</label>
                    <input type="text" name="nama" id=""value="{{ 
                    $listfakultas->nama }}">
                </div>
                <button type="submit "class="tombol">Update</button>

@endsection