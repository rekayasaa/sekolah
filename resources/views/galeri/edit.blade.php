@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman edit Data</p>

                <form method="POST" action="{{ route('galeri.update', $data['id']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row align-items-right">
                        <label for="album_id" class="form-control-label col-sm-2 text-md-right">Album Id</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="album_id" class="form-control" id="album_id"
                                value="{{ $data['album_id'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="judul" class="form-control" id="judul"
                                value="{{ $data['judul'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="slug" class="form-control-label col-sm-2 text-md-right">Slug</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="slug" class="form-control" id="slug"
                                value="{{ $data['slug'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="file" name="gambar" value="{{ $data['gambar'] }}" class="form-control"
                                id="gambar">
                        </div>
                    </div>

                    @if ($data['gambar'])
                        <div class="mb-3">
                            <img src="{{ asset($data['gambar']) }}" alt="Gambar saat ini" style="max-width: 200px;">
                        </div>
                    @endif

                    <div class="form-group row align-items-right">
                        <label for="keterangan" class="form-control-label col-sm-2 text-md-right">Keterangan</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="keterangan" class="form-control" id="keterangan"
                                value="{{ $data['keterangan'] }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
