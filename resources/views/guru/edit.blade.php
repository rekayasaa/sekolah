@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/guru">{{ $option['modul'] }}</a></div>
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
                            <form method="POST" action="{{ route('guru.update', $data['id']) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row align-items-right">
                                    <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama" value="{{ $data['nama'] }}"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama">

                                        @error('nama')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="nip" class="form-control-label col-sm-2 text-md-right">Nip</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nip" value="{{ $data['nip'] }}"
                                            class="form-control @error('nip') is-invalid @enderror" id="nip">

                                        @error('nip')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="tempat_lahir" class="form-control-label col-sm-2 text-md-right">Tempat
                                        Lahir</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="tempat_lahir" value="{{ $data['tempat_lahir'] }}"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir">

                                        @error('tempat_lahir')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="tgl_lahir" class="form-control-label col-sm-2 text-md-right">Tgl
                                        Lahir</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="date" name="tgl_lahir" value="{{ $data['tgl_lahir'] }}"
                                            class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir">

                                        @error('tgl_lahir')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="jabatan" class="form-control-label col-sm-2 text-md-right">Jabatan</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="jabatan" value="{{ $data['jabatan'] }}"
                                            class="form-control @error('jabatan') is-invalid @enderror" id="jabatan">

                                        @error('jabatan')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row align-items-right">
                                    <label for="foto" class="form-control-label col-sm-2 text-md-right">Foto</label>
                                    <div class="col-sm-6 col-md-9">
                                        @if ($data['foto'])
                                            <div class="mb-3">
                                                <img src="{{ asset($data['foto']) }}" alt="Foto saat ini"
                                                    style="max-width: 200px;">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="foto">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @error('foto')
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
                                        <a href="/guru" class="btn btn-danger waves-effect waves-light">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
