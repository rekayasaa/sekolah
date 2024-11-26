@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ $option['modul'] }}</a></div>
                    <div class="breadcrumb-item">{{ $option['active'] }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $option['active'] }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('downlod.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row align-items-right">
                                    <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="judul" value="{{ old('judul') }}"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul">

                                        @error('judul')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="file" class="form-control-label col-sm-2 text-md-right">File</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="file" value="{{ old('file') }}"
                                            class="form-control @error('file') is-invalid @enderror" id="file">

                                        @error('file')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="hit" class="form-control-label col-sm-2 text-md-right">Hit</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="number" name="hit" value="{{ old('hit') }}"
                                            class="form-control @error('hit') is-invalid @enderror" id="hit">

                                        @error('hit')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row align-items-right">
                                    <label class="form-control-label col-sm-2 text-md-right"></label>
                                    <div class="col-sm-12 col-md-7 mt-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Simpan</button>
                                        <a href="/downlod" class="btn btn-danger waves-effect waves-light">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
