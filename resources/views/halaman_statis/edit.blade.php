@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/halaman_statis">{{ $option['modul'] }}</a></div>
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
                            <form method="POST" action="{{ route('halaman_statis.update', $data['id']) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row align-items-right">
                                    <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="judul" value="{{ $data['judul'] }}"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul">

                                        @error('judul')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="isi_halaman" class="form-control-label col-sm-2 text-md-right">Isi
                                        Halaman</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="isi_halaman" value="{{ $data['isi_halaman'] }}"
                                            class="form-control @error('isi_halaman') is-invalid @enderror"
                                            id="isi_halaman">

                                        @error('isi_halaman')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                                    <div class="col-sm-6 col-md-9">
                                        @if ($data['gambar'])
                                            <div class="mb-3">
                                                <img src="{{ asset($data['gambar']) }}" alt="Gambar saat ini"
                                                    style="max-width: 200px;">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @error('gambar')
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
                                        <a href="/halaman_statis"
                                            class="btn btn-danger waves-effect waves-light">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
