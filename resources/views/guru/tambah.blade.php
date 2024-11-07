@extends('components.layout')

@section('content') 
<div class="main-content" style="min-height: 490px;">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Halaman Tambah Data</p>

           
            <form method="POST" action="{{ route('guru.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row align-items-right">
                    <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="nip" class="form-control-label col-sm-2 text-md-right">Nip</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="nip" class="form-control" id="nip" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="tempat_lahir" class="form-control-label col-sm-2 text-md-right">Tempat Lahir</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="tgl_lahir" class="form-control-label col-sm-2 text-md-right">Tgl Lahir</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="jabatan" class="form-control-label col-sm-2 text-md-right">Jabatan</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" name="jabatan" class="form-control" id="jabatan" required>
                    </div>
                </div>
                <div class="form-group row align-items-right">
                    <label for="foto" class="form-control-label col-sm-2 text-md-right">Foto</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="file" name="foto" class="form-control" id="foto" required>
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
