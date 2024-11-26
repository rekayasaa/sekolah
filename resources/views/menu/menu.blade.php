@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $option['title'] }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/menu">{{ $option['modul'] }}</a></div>
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
                            <a href="/menu/tambah" class="btn btn-primary mb-4">
                                <div>Tambah</div>
                            </a>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Parent</th>
                                            <th>Urut</th>
                                            <th>Link</th>
                                            <th>Aktif</th>
                                            <th>Tipe</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @if ($data_menu)
                                            @foreach ($data_menu as $a)
                                                <tr class="mt-4 mb-4">
                                                    <td style="text-align: center;">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td class="text-left">
                                                        {{ $a['nama'] }}
                                                    </td>
                                                    <td>
                                                        {{ $a['parent'] }}
                                                    </td>
                                                    </td>
                                                    <td>
                                                        {{ $a['urut'] }}
                                                    </td>
                                                    <td>
                                                        {{ $a['link'] }}
                                                    </td>
                                                    <td>
                                                        {{ $a['aktif'] }}
                                                    </td>
                                                    <td>
                                                        {{ $a['tipe'] }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href='menu/edit/{{ $a['id'] }}'
                                                            class="btn btn-warning btn-sm mb-2" title="Edit"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href='menu/{{ $a['id'] }}/destroy'
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
        </section>
    </div>
@endsection
