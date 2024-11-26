@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1> <!-- Menampilkan judul halaman sesuai dengan opsi -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <!-- Menampilkan link ke Dashboard -->
                    <div class="breadcrumb-item"><a href="/berita">{{ $option['modul'] }}</a></div>
                    <!-- Menampilkan link modul Berita -->
                    <div class="breadcrumb-item">{{ $option['active'] }}</div> <!-- Menampilkan nama halaman aktif -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>{{ $option['active'] }}</h4> <!-- Menampilkan judul aktif dari opsi -->
                        </div>

                        <div class="card-body">
                            <!-- Form untuk mengedit data berita -->
                            <form method="POST" action="{{ route('berita.update', $data['id']) }}"
                                enctype="multipart/form-data">
                                @csrf <!-- Menyisipkan token CSRF untuk mengamankan form -->
                                @method('PUT') <!-- Menandakan bahwa ini adalah request PUT untuk update data -->

                                <!-- Input untuk judul berita -->
                                <div class="form-group row align-items-right">
                                    <label for="judul" class="form-control-label col-sm-2 text-md-right">Judul</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="judul" value="{{ $data['judul'] }}"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul">
                                        @error('judul')
                                            <div class="invalid-feedback" style="display:inline">{{ $message }}</div>
                                            <!-- Menampilkan error jika ada -->
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input untuk isi berita -->
                                <div class="form-group row align-items-right">
                                    <label for="isi_berita" class="form-control-label col-sm-2 text-md-right">Isi
                                        Berita</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="summernote @error('isi_berita') is-invalid @enderror" name="isi_berita" style="display: none;"
                                            id="isi_berita">{{ $data['isi_berita'] }}</textarea>
                                        @error('isi_berita')
                                            <div class="invalid-feedback" style="display:inline">{{ $message }}</div>
                                            <!-- Menampilkan error jika ada -->
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih penulis -->
                                <div class="form-group row align-items-right">
                                    <label for="penulis_id"
                                        class="form-control-label col-sm-2 text-md-right">Penulis</label>
                                    <div class="col-sm-6 col-md-9">
                                        <select class="form-control @error('penulis_id') is-invalid @enderror"
                                            name="penulis_id" id="penulis_id">
                                            <option value="">-- Pilih User --</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user['id'] }}"
                                                    {{ $data['penulis_id'] == $user['id'] ? 'selected' : '' }}>
                                                    {{ $user['name'] }}</option> <!-- Menampilkan pilihan penulis -->
                                            @endforeach
                                        </select>
                                        @error('penulis_id')
                                            <div class="invalid-feedback" style="display:inline">{{ $message }}</div>
                                            <!-- Menampilkan error jika ada -->
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih kategori -->
                                <div class="form-group row align-items-right">
                                    <label for="kategori_id"
                                        class="form-control-label col-sm-2 text-md-right">Kategori</label>
                                    <div class="col-sm-6 col-md-9">
                                        <select class="form-control @error('kategori_id') is-invalid @enderror"
                                            name="kategori_id" id="kategori_id">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat['id'] }}" @selected($data['kategori_id'] == $kat['id'])>
                                                    {{ $kat['nama'] }}</option> <!-- Menampilkan pilihan kategori -->
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback" style="display:inline">{{ $message }}</div>
                                            <!-- Menampilkan error jika ada -->
                                        @enderror
                                    </div>
                                </div>

                                <!-- Checkbox untuk status headline -->
                                <div class="form-group row align-items-right">
                                    <label for="headline" class="form-control-label col-sm-2 text-md-right">Headline</label>
                                    <div class="col-sm-6 col-md-9">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="headline" value="Y"
                                                @checked($data['headline']) class="custom-switch-input" id="headline">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Ya</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Checkbox untuk status publik -->
                                <div class="form-group row align-items-right">
                                    <label for="publik" class="form-control-label col-sm-2 text-md-right">Publik</label>
                                    <div class="col-sm-6 col-md-9">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="publik" value="Y"
                                                @checked($data['publik']) class="custom-switch-input" id="publik">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Ya</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Input untuk gambar berita -->
                                <div class="form-group row align-items-right">
                                    <label for="gambar" class="form-control-label col-sm-2 text-md-right">Gambar</label>
                                    <div class="col-sm-6 col-md-9">
                                        @if ($data['gambar'])
                                            <!-- Menampilkan gambar saat ini jika ada -->
                                            <div class="mb-3">
                                                <img src="{{ asset($data['gambar']) }}" alt="Gambar saat ini"
                                                    style="max-width: 200px;">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                            <label class="custom-file-label" for="gambar">Choose file</label>
                                        </div>
                                        @error('gambar')
                                            <div class="invalid-feedback" style="display:inline">{{ $message }}</div>
                                            <!-- Menampilkan error jika ada -->
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tombol untuk simpan atau kembali -->
                                <div class="form-group row align-items-right">
                                    <label class="form-control-label col-sm-2 text-md-right"></label>
                                    <div class="col-sm-12 col-md-7 mt-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Simpan</button>
                                        <a href="/berita" class="btn btn-danger waves-effect waves-light">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@include('berita.library') <!-- Menyertakan library atau script tambahan yang diperlukan oleh halaman -->
