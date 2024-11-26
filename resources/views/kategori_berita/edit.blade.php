@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1> <!-- Menampilkan judul halaman sesuai dengan opsi -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <!-- Menampilkan link ke Dashboard -->
                    <div class="breadcrumb-item"><a href="/kategori_berita">{{ $option['modul'] }}</a></div>
                    <!-- Menampilkan link modul Berita -->
                    <div class="breadcrumb-item">{{ $option['active'] }}</div> <!-- Menampilkan nama halaman aktif -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $option['active'] }}</h4> <!-- Menampilkan judul aktif dari opsi -->
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('kategori_berita.update', $data['id']) }}"
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

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
