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
                        <form method="POST" action="{{ route('berita.update', $data['id']) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row align-items-right">
                                <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="judul" value="{{ $data['judul'] }}" class="form-control @error('judul') is-invalid @enderror" id="judul">

                                    @error('judul')
                                    <div class="invalid-feedback" style="display:inline">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="isi_berita" class="form-control-label col-sm-2 text-md-right">Isi Berita</label>
                                <div class="col-sm-6 col-md-9">
                                    <textarea class="summernote @error('isi_berita') is-invalid @enderror" name="isi_berita" style="display: none;" id="isi_berita">
                                    {{ $data['isi_berita'] }}
                                    </textarea>
                                    @error('isi_berita')
                                    <div class="invalid-feedback" style="display:inline">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="penulis_id" class="form-control-label col-sm-2 text-md-right">Penulis</label>
                                <div class="col-sm-6 col-md-9">
                                    <select class="form-control @error('penulis_id') is-invalid @enderror" name="penulis_id" id="penulis_id">
                                        <option value="">-- Pilih User --</option>
                                        @foreach ($user as $user)
                                        <option value="{{ $user['id'] }}" {{ $data['penulis_id'] == $user['id'] ? 'selected' : '' }}>
                                            {{ $user['name'] }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('penulis_id')
                                    <div class="invalid-feedback" style="display:inline">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="kategori_id" class="form-control-label col-sm-2 text-md-right">Kategori</label>
                                <div class="col-sm-6 col-md-9">
                                    <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                        <option value="">-- Pilih Kategori --</option>

                                        @foreach ($kategori as $kat)
                                        <option value="{{ $kat['id'] }}" @selected($data['kategori_id']==$kat['id'])>
                                            {{ $kat['nama'] }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('kategori_id')
                                    <div class="invalid-feedback" style="display:inline">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="headline" class="form-control-label col-sm-2 text-md-right">Headline</label>
                                <div class="col-sm-6 col-md-9">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="headline" value="Y" @checked($data['headline']) class="custom-switch-input" id="headline">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Ya</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="publik" class="form-control-label col-sm-2 text-md-right">Publik</label>
                                <div class="col-sm-6 col-md-9">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="publik" value="Y" @checked($data['publik']) class="custom-switch-input" id="publik">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Ya</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row align-items-right">
                                <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                                <div class="col-sm-6 col-md-9">
                                    @if ($data['gambar'])
                                    <div class="mb-3">
                                        <img src="{{ asset($data['gambar']) }}" alt="Gambar saat ini" style="max-width: 200px;">
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
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                    <a href="/berita" class="btn btn-danger waves-effect waves-light">Kembali</a>
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

@include('berita.library')