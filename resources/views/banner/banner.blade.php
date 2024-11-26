@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/banner">{{ $option['modul'] }}</a></div>
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
                            <a href="/banner/tambah"class="btn btn-primary mb-4">
                                <div>Tambah</div>
                            </a>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Url</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @if ($data_banner)
                                            @foreach ($data_banner as $a)
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
                                                        {{ $a['judul'] }}
                                                    </td>
                                                    <td>
                                                        {{ $a['url'] }}
                                                    </td>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href='banner/edit/{{ $a['id'] }}'
                                                            class="btn btn-warning btn-sm mb-2" title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href='banner/{{ $a['id'] }}/destroy'
                                                            class="btn btn-danger btn-sm mb-2" data-confirm-delete="true"
                                                            title="Hapus"><i class="fas fa-trash"></i></a>
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

    </div>
    </section>
    </div>
@endsection
