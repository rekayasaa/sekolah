@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/menu">{{ $option['modul'] }}</a></div>
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
                            <form method="POST" action="{{ route('menu.update', $data['id']) }}"
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
                                    <label for="parent" class="form-control-label col-sm-2 text-md-right">Parent</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="parent" value="{{ $data['parent'] }}"
                                            class="form-control @error('parent') is-invalid @enderror" id="parent">

                                        @error('parent')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="urut" class="form-control-label col-sm-2 text-md-right">Urut</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="urut" value="{{ $data['urut'] }}"
                                            class="form-control @error('urut') is-invalid @enderror" id="urut">

                                        @error('urut')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="link" class="form-control-label col-sm-2 text-md-right">Link</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="link" value="{{ $data['link'] }}"
                                            class="form-control @error('link') is-invalid @enderror" id="link">

                                        @error('link')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="aktif" class="form-control-label col-sm-2 text-md-right">Aktif</label>
                                    <div class="col-sm-6 col-md-9">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="aktif" value="Y"
                                                @checked($data['aktif']) class="custom-switch-input" id="aktif">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Ya</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="tipe" class="form-control-label col-sm-2 text-md-right">Tipe</label>
                                    <div class="col-sm-6 col-md-9">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="tipe" value="1"
                                                @checked($data['tipe']) class="custom-switch-input" id="tipe">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Ya</span>
                                        </label>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
