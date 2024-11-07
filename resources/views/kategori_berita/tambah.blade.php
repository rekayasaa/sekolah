@extends('components.layout')

@section('content') 
<div class="main-content" style="min-height: 490px;">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Halaman Tambah Data</p>

            <form method="POST" action="{{ route('kategori_berita.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row align-items-right">
                    <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="slug" class="form-control-label col-sm-2 text-md-right">Slug</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="slug" class="form-control" id="slug" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="aktif" class="form-control-label col-sm-2 text-md-right">Aktif</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="aktif" class="form-control" id="aktif" required>
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
