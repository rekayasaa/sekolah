@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/berita">{{ $option['modul'] }}</a></div>
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
                            <form method="POST" action="{{ route('identitas.update', $data['id']) }}"
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
                                    <label for="alamat" class="form-control-label col-sm-2 text-md-right">Alamat</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="alamat" value="{{ $data['alamat'] }}"
                                            class="form-control @error('alamat') is-invalid @enderror" id="alamat">

                                        @error('alamat')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="facebook" class="form-control-label col-sm-2 text-md-right">Facebook</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="facebook" value="{{ $data['facebook'] }}"
                                            class="form-control @error('facebook') is-invalid @enderror" id="facebook">

                                        @error('facebook')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="instagram"
                                        class="form-control-label col-sm-2 text-md-right">Instagram</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="instagram" value="{{ $data['instagram'] }}"
                                            class="form-control @error('instagram') is-invalid @enderror" id="instagram">

                                        @error('instagram')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="youtube" class="form-control-label col-sm-2 text-md-right">YouTube</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="youtube" value="{{ $data['youtube'] }}"
                                            class="form-control @error('youtube') is-invalid @enderror" id="youtube">

                                        @error('youtube')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="kor_lat" class="form-control-label col-sm-2 text-md-right">Korlat</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="kor_lat" value="{{ $data['kor_lat'] }}"
                                            class="form-control @error('kor_lat') is-invalid @enderror" id="kor_lat">

                                        @error('kor_lat')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="kor_long" class="form-control-label col-sm-2 text-md-right">Korlong</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="kor_long" value="{{ $data['kor_long'] }}"
                                            class="form-control @error('kor_long') is-invalid @enderror" id="kor_long">

                                        @error('kor_long')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="url" class="form-control-label col-sm-2 text-md-right">URL</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="url" value="{{ $data['url'] }}"
                                            class="form-control @error('url') is-invalid @enderror" id="url">

                                        @error('url')
                                            <div class="invalid-feedback" style="display:inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row align-items-right">
                                    <label for="email" class="form-control-label col-sm-2 text-md-right">Email</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="email" value="{{ $data['email'] }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email">

                                        @error('email')
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
                                        <a href="/identitas" class="btn btn-danger waves-effect waves-light">Kembali</a>
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
