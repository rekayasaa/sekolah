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


                <form method="POST" action="{{ route('kategori_berita.update', $data['id']) }}"
                    enctype="multipart/form-data">
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
                        <label for="aktif" class="form-control-label col-sm-2 text-md-right">Aktif</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="aktif" value="{{ $data['aktif'] }}" class="form-control"
                                id="aktif">
                            @error('aktif')
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
