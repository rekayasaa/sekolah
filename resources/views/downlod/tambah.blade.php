@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman Tambah Data</p>



                <form method="POST" action="{{ route('downlod.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row align-items-right">
                        <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control"
                                id="judul">
                            @error('judul')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-right">
                        <label for="file" class="form-control-label col-sm-2 text-md-right">file</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="file" value="{{ old('file') }}" class="form-control"
                                id="file">
                            @error('file')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="hit" class="form-control-label col-sm-2 text-md-right">Hit</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="hit" value="{{ old('hit') }}" class="form-control"
                                id="hit">
                            @error('hit')
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