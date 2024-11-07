@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman edit Data</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="POST" action="{{ route('banner.update', $data['id']) }}" enctype="multipart/form-data">
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
                        <label for="url" class="form-control-label col-sm-2 text-md-right">Url</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="url" value="{{ $data['url'] }}" class="form-control"
                                id="url">
                            @error('url')
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



                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
