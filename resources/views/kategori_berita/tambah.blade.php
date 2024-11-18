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
                        <form method="POST" action="{{ route('kategori_berita.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row align-items-right">
                                <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama">

                                    @error('nama')
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
                                        <input type="checkbox" name="aktif" value="Y" @checked(old('aktif')) class="custom-switch-input" id="aktif">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Ya</span>
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer bg-white text-md-left">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection