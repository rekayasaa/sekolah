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


                <form method="POST" action="{{ route('identitas.update', $data['id']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row align-items-right">
                        <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nama" value="{{ $data['nama'] }}" class="form-control"
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
                            <input type="text" name="alamat"value="{{ $data['alamat'] }}" class="form-control"
                                id="alamat">
                            @error('alamat')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="facebook" class="form-control-label col-sm-2 text-md-right">Facebook</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="facebook"value="{{ $data['facebook'] }}" class="form-control"
                                id="facebook">
                            @error('facebook')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="instagram" class="form-control-label col-sm-2 text-md-right">Instagram</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="instagram"value="{{ $data['instagram'] }}" class="form-control"
                                id="instagram">
                            @error('instagram')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="youtube" class="form-control-label col-sm-2 text-md-right">YouTube</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="youtube"value="{{ $data['youtube'] }}" class="form-control"
                                id="youtube">
                            @error('youtube')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="kor_lat" class="form-control-label col-sm-2 text-md-right">Korlat</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="kor_lat"value="{{ $data['kor_lat'] }}" class="form-control"
                                id="kor_lat">
                            @error('kor_lat')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="kor_long" class="form-control-label col-sm-2 text-md-right">Korlong</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="kor_long"value="{{ $data['kor_long'] }}" class="form-control"
                                id="kor_long">
                            @error('kor_long')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="url" class="form-control-label col-sm-2 text-md-right">URL</label>
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
                        <label for="email" class="form-control-label col-sm-2 text-md-right">Email</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="email" value="{{ $data['email'] }}" class="form-control"
                                id="email">
                            @error('email')
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
