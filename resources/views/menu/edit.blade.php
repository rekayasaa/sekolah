@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman edit Data</p>


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
                        <label for="parent" class="form-control-label col-sm-2 text-md-right">Parent</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="parent" value="{{ $data['parent'] }}" class="form-control"
                                id="parent">
                            @error('parent')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="urut" class="form-control-label col-sm-2 text-md-right">Urut</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="urut" value="{{ $data['urut'] }}" class="form-control"
                                id="urut">
                            @error('urut')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="link" class="form-control-label col-sm-2 text-md-right">Link</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="link" value="{{ $data['link'] }}" class="form-control"
                                id="link">
                            @error('link')
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
                    <div class="form-group row align-items-right">
                        <label for="tipe" class="form-control-label col-sm-2 text-md-right">Tipe</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="tipe" value="{{ $data['tipe'] }}" class="form-control"
                                id="tipe">
                            @error('tipe')
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
