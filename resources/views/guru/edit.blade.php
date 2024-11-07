@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <div class="card" id="settings-card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Halaman edit Data</p>

                <form method="POST" action="{{ route('guru.update', $data['id']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row align-items-right">
                        <label for="nama" class="form-control-label col-sm-2 text-md-right">Nama</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ $data['nama'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="nip" class="form-control-label col-sm-2 text-md-right">NIP</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="nip" class="form-control" id="nip"
                                value="{{ $data['nip'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="tempat_lahir" class="form-control-label col-sm-2 text-md-right">Tempat Lahir</label>
                        <div class="col-sm-6 col-md-9">
                            <!-- Ganti name menjadi tempat_lahir agar sesuai dengan database -->
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                value="{{ $data['tempat_lahir'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="tgl_lahir" class="form-control-label col-sm-2 text-md-right">Tgl Lahir</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                                value="{{ $data['tgl_lahir'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="jabatan" class="form-control-label col-sm-2 text-md-right">Jabatan</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="jabatan" class="form-control" id="jabatan"
                                value="{{ $data['jabatan'] }}" required>
                        </div>
                    </div>

                    <div class="form-group row align-items-right">
                        <label for="foto" class="form-control-label col-sm-2 text-md-right">Foto</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="file" name="foto" value="{{ $data['foto'] }}" class="form-control"
                                id="foto">
                            @error('foto')
                                <div class="" style="width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    @if ($data['foto'])
                        <div class="mb-3">
                            <img src="{{ asset($data['foto']) }}" alt="Gambar saat ini" style="max-width: 200px;">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
