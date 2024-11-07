@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman edit Data</p>

                <form method="POST" action="{{ route('berita.update', $data['id']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row align-items-right">
                        <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="judul" value="{{ $data['judul'] }}" class="form-control"
                                id="judul">
                            @error('judul')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="isi_berita" class="form-control-label col-sm-2 text-md-right">Isi Berita</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="isi_berita" value="{{ $data['isi_berita'] }}" class="form-control"
                                id="isi_berita">
                            @error('isi_berita')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="penulis_id" class="form-control-label col-sm-2 text-md-right">Penulis ID</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="penulis_id" value="{{ $data['penulis_id'] }}" class="form-control"
                                id="penulis_id">
                            @error('penulis_id')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="kategori_id" class="form-control-label col-sm-2 text-md-right">Kategori ID</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="kategori_id" value="{{ $data['kategori_id'] }}" class="form-control"
                                id="kategori_id">
                            @error('kategori_id')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="tag_id" class="form-control-label col-sm-2 text-md-right">Tag ID</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="tag_id" value="{{ $data['tag_id'] }}" class="form-control"
                                id="tag_id">
                            @error('tag_id')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="slug" class="form-control-label col-sm-2 text-md-right">Slug</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="slug" value="{{ $data['slug'] }}" class="form-control"
                                id="slug">
                            @error('slug')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="headline" class="form-control-label col-sm-2 text-md-right">Headline</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="headline" value="{{ $data['headline'] }}" class="form-control"
                                id="headline">
                            @error('headline')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="publik" class="form-control-label col-sm-2 text-md-right">Publik</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="publik" value="{{ $data['publik'] }}" class="form-control"
                                id="publik">
                            @error('publik')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="file" name="gambar" value="{{ $data['gambar'] }}" class="form-control"
                                id="gambar">
                            @error('gambar')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    @if ($data['gambar'])
                        <div class="mb-3">
                            <img src="{{ asset($data['gambar']) }}" alt="Gambar saat ini" style="max-width: 200px;">
                        </div>
                    @endif

                    <div class="form-group row align-items-right">
                        <label for="hit" class="form-control-label col-sm-2 text-md-right">Hit</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="hit" value="{{ $data['hit'] }}" class="form-control"
                                id="hit">
                            @error('hit')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
