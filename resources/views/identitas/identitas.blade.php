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
                            <form action="{{ route('identitas.store') }}" method="POST">
                                @csrf

                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Url</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_identitas as $a)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td class="text-left">{{ $a['nama'] }}</td>
                                                    <td>{{ $a['alamat'] }}</td>
                                                    <td>{{ $a['url'] }}</td>
                                                    <td>{{ $a['email'] }}</td>
                                                    <td style="text-align: center;">
                                                        <a href='identitas/edit/{{ $a['id'] }}'
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <button class="btn btn-danger" data-toggle="modal"
                                                            data-target="#hapusmodal">Hapus</button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <td>
                                                <a href='identitas/detail' class="btn btn-primary btn-sm">Detail</a>
                                            </td>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
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
                        <a href='identitas/{{ $a['id'] }}' class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
