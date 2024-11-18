@extends('components.layout')

@section('content')
<div class="main-content" style="min-height: 490px;">
    <section class="section">
        <div class="section-header">
            <h1>{{ $option['title'] }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/berita">{{ $option['modul'] }}</a></div>
                <div class="breadcrumb-item">{{ $option['active'] }}</div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $option['active'] }}</h4>
                    </div>

                    <div class="card-body">
                        @csrf

                        <!-- Tombol Tambah Data -->
                        <a href="/berita/tambah" class="btn btn-primary mb-4">
                            <div>Tambah</div>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th style="width: 2%;" class="text-center">#</th>
                                        <th style="width: 10%;">Gambar</th>
                                        <th style="width: 50%">Berita</th>
                                        <th style="width: 13%;">Penulis</th>
                                        <th style="width: 5%;">Headline</th>
                                        <th style="width: 5%;">Publik</th>
                                        <th style="width: 5%;">Hit</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @if ($data_berita)

                                    @foreach ($data_berita as $a)
                                    <tr class="mt-4 mb-4">
                                        <td style="text-align: center;">
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            <a href="{{ asset($a['gambar']) }}" target="_blank">
                                                <img src="{{ asset($a['gambar']) }}" alt="Gambar Berita"
                                                    width="100">
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            Judul: <strong>{{ $a['judul'] }}</strong><br>
                                            Katagori: <strong>{{ $a['kategori'] }}</strong>
                                            <br>
                                            {{ Str::limit($a['isi_berita'], 150) }}
                                        </td>
                                        </td>
                                        <td>
                                            {{ $a['penulis'] }}
                                        </td>
                                        <td>
                                            {{ $a['headline'] }}
                                        </td>
                                        <td>
                                            {{ $a['publik'] }}
                                        </td>
                                        <td>
                                            {{ $a['hit'] }}
                                        </td>
                                        <td style="text-align: center;">
                                            <a href='berita/show/{{ $a['slug'] }}' class="btn btn-info btn-sm mb-2" title="Detail"><i class="fas fa-eye"></i></a>
                                            <a href='berita/edit/{{ $a['id'] }}' class="btn btn-warning btn-sm mb-2" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a href='berita/{{ $a['id'] }}/destroy' class="btn btn-danger btn-sm mb-2" data-confirm-delete="true" title="Hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else

                                    <tr>
                                        <td>
                                            Belum ada berita
                                        </td>
                                    </tr>

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

@include('berita.library')