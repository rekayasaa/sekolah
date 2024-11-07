@extends('components.layout')

@section('content') 
<div class="main-content" style="min-height: 490px;">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Halaman Tambah Data</p>

            <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row align-items-right">
                    <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="judul" class="form-control" id="judul" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="isi_berita" class="form-control-label col-sm-2 text-md-right">Isi Berita</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="isi_berita" class="form-control" id="isi_berita" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="penulis_id" class="form-control-label col-sm-2 text-md-right">Penulis ID</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="number" name="penulis_id" class="form-control" id="penulis_id" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="kategori_id" class="form-control-label col-sm-2 text-md-right">Kategori ID</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="number" name="kategori_id" class="form-control" id="kategori_id" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="tag_id" class="form-control-label col-sm-2 text-md-right">Tag ID</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="number" name="tag_id" class="form-control" id="tag_id" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="slug" class="form-control-label col-sm-2 text-md-right">Slug</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="slug" class="form-control" id="slug" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="headline" class="form-control-label col-sm-2 text-md-right">Headline</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="headline" class="form-control" id="headline" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="publik" class="form-control-label col-sm-2 text-md-right">publik</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="publik" class="form-control" id="publik" required>
                    </div></div>
                <div class="form-group row align-items-right">
                    <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="file" name="gambar" class="form-control" id="gambar" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="hit" class="form-control-label col-sm-2 text-md-right">Hit</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="number" name="hit" class="form-control" id="hit" required>
                    </div>
                </div>
                <div class="card-footer bg-white text-md-left">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
