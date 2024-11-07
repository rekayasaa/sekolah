@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman Tambah Data</p>



                <form method="POST" action="{{ route('identitas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row align-items-right">
                        <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control"
                                id="nama">
                            @error('nama')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="alamat" class="form-control-label col-sm-2 text-md-right">Alamat</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control"
                                id="alamat">
                            @error('alamat')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="url" class="form-control-label col-sm-2 text-md-right">URL</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="url" value="{{ old('url') }}" class="form-control"
                                id="url">
                            @error('url')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="email" class="form-control-label col-sm-2 text-md-right">Email</label>
                        <div class="col-sm-6 col-md-9">

                            <input type="text" name="email" value="{{ old('email') }}"class="form-control"
                                id="email">
                            @error('email')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="card-footer bg-white text-md-left">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
