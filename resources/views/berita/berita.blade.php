@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <!-- Menampilkan judul halaman sesuai dengan opsi -->
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <!-- Menampilkan link ke Dashboard -->
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <!-- Menampilkan link modul Berita -->
                    <div class="breadcrumb-item"><a href="/berita">{{ $option['modul'] }}</a></div>
                    <!-- Menampilkan nama halaman aktif -->
                    <div class="breadcrumb-item">{{ $option['active'] }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $option['active'] }}</h4> <!-- Menampilkan judul aktif dari opsi -->
                        </div>

                        <div class="card-body">
                            @csrf <!-- Menyisipkan token CSRF untuk mengamankan form -->

                            <!-- Tombol Tambah Data -->
                            <a href="/berita/tambah" class="btn btn-primary mb-4">
                                <div>Tambah</div> <!-- Tombol untuk menambah data berita -->
                            </a>

                            <!-- Tabel Data Berita -->
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;" class="text-center">#</th>
                                            <!-- Kolom untuk nomor urut -->
                                            <th style="width: 10%;">Gambar</th> <!-- Kolom untuk gambar berita -->
                                            <th style="width: 50%">Berita</th> <!-- Kolom untuk judul dan isi berita -->
                                            <th style="width: 13%;">Penulis</th> <!-- Kolom untuk nama penulis -->
                                            <th style="width: 5%;">Headline</th> <!-- Kolom untuk status headline -->
                                            <th style="width: 5%;">Publik</th> <!-- Kolom untuk status publikasi -->
                                            <th style="width: 5%;">Hit</th> <!-- Kolom untuk jumlah hit berita -->
                                            <th style="width: 10%;">Aksi</th>
                                            <!-- Kolom untuk tombol aksi (edit, hapus, detail) -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1; // Inisialisasi nomor urut berita
                                        ?>
                                        @if ($data_berita)
                                            <!-- Mengecek apakah ada data berita -->
                                            @foreach ($data_berita as $a)
                                                <!-- Loop untuk menampilkan setiap berita -->
                                                <tr class="mt-4 mb-4">
                                                    <td style="text-align: center;">
                                                        {{ $no++ }} <!-- Menampilkan nomor urut berita -->
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset($a['gambar']) }}" target="_blank">
                                                            <img src="{{ asset($a['gambar']) }}" alt="Gambar Berita"
                                                                width="100"> <!-- Menampilkan gambar berita -->
                                                        </a>
                                                    </td>
                                                    <td class="text-left">
                                                        Judul: <strong>{{ $a['judul'] }}</strong><br>
                                                        <!-- Menampilkan judul berita -->
                                                        Katagori: <strong>{{ $a['kategori'] }}</strong><br>
                                                        <!-- Menampilkan kategori berita -->
                                                        {{ Str::limit($a['isi_berita'], 150) }}
                                                        <!-- Menampilkan cuplikan isi berita (dibatasi 150 karakter) -->
                                                    </td>
                                                    <td>
                                                        {{ $a['penulis'] }} <!-- Menampilkan nama penulis berita -->
                                                    </td>
                                                    <td>
                                                        {{ $a['headline'] }} <!-- Menampilkan status headline berita -->
                                                    </td>
                                                    <td>
                                                        {{ $a['publik'] }} <!-- Menampilkan status publikasi berita -->
                                                    </td>
                                                    <td>
                                                        {{ $a['hit'] }} <!-- Menampilkan jumlah hit berita -->
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <!-- Menampilkan tombol aksi: detail, edit, hapus -->
                                                        <a href='berita/show/{{ $a['slug'] }}'
                                                            class="btn btn-info btn-sm mb-2" title="Detail">
                                                            <i class="fas fa-eye"></i>
                                                            <!-- Ikon untuk melihat detail berita -->
                                                        </a>
                                                        <a href='berita/edit/{{ $a['id'] }}'
                                                            class="btn btn-warning btn-sm mb-2" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            <!-- Ikon untuk mengedit berita -->
                                                        </a>
                                                        <a href='berita/{{ $a['id'] }}/destroy'
                                                            class="btn btn-danger btn-sm mb-2" data-confirm-delete="true"
                                                            title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                            <!-- Ikon untuk menghapus berita -->
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@include('berita.library') <!-- Menyertakan library atau script tambahan yang diperlukan oleh halaman -->
