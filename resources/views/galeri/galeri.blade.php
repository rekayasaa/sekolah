@extends('components.layout')

@section('content')
    <div class="main-content" style="min-height: 490px;">
        <section class="section">
            <div class="section-header">
                {{ $title }}
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
                            <form action="{{ route('galeri.store') }}" method="POST">
                                @csrf

                                <!-- Tombol Tambah Data -->
                                <a href="http://sekolah.test/galeri/tambah"class="btn btn-primary mb-3">
                                    <div>TAMBAH DATA</div>
                                </a>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Album ID</th>
                                                    <th>Judul</th>
                                                    <th>Slug</th>
                                                    <th>Gambar</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_galeri as $a)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td class="text-left">{{ $a['album_id'] }}</td>
                                                        <td>{{ $a['judul'] }}</td>
                                                        <td>{{ $a['slug'] }}</td>
                                                        <td>
                                                            <img src="{{ asset($a['gambar']) }}" alt="Gambar Galeri"
                                                                width="100">
                                                        </td>
                                                        <td>{{ $a['keterangan'] }}</td>
                                                        <td style="text-align: center;">
                                                            <a href='galeri/edit/{{ $a['id'] }}'
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <!-- Button to trigger modal -->
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#hapusmodal"
                                                                data-id="{{ $a['id'] }}">Hapus</button>
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
        </section>
    </div>

    <!-- Modal Hapus -->
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
                    <a href="#" class="btn btn-danger btn-sm" id="confirm-delete">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle dynamic ID in modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#hapusmodal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes
                var url = 'galeri/' + id; // Construct the delete URL with ID

                // Update the modal's delete button href
                $('#confirm-delete').attr('href', url);
            });
        });
    </script>
@endsection
