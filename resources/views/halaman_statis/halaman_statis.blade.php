@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                <h1>DataTables</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            <th>Judul</th>
                                            <th>Isi Halaman</th>
                                            <th>gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0">
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach ($data_statis as $a)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td class="text-left">
                                                    {{ $a['judul'] }}
                                                </td>
                                                <td>
                                                    {{ $a['isi_halaman'] }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($a['gambar']) }}" alt="Gambar HalamanStatis"
                                                        width="100">
                                                </td>

                                                <td style="text-align: center;">
                                                    <a href='halaman_statis/edit/{{ $a['id'] }}'
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger" data-toggle="modal"
                                                        data-target="#hapusmodal">Hapus</button>
                                                    {{-- <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        
                                    </div>
                                </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kamu Yakin Ingin Menghapusnya?!!</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a href='halaman_statis/{{ $a['id'] }}' class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
