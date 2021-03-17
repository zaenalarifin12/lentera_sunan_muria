@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Postingan</h6>

                    <a href="{{ url('/post/create') }}" class="btn btn-sm btn-success float-right">Tambah</a>
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="oke" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Dilihat</th>
                                <th>Penulis</th>
                                <th>Dibuat</th>
                                <th>Dipublish</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#oke').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('post') }}",

                order: [5, "desc"],

                columns: [

                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'see',
                        name: 'see'
                    },
                    {
                        data: 'writer_name',
                        name: 'writer_name'
                    },
                    {
                        data: 'publish',
                        name: 'publish'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

    </script>

    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apa Kamu Yakin?',
                text: 'menghapus penulis ini akan menghapus permanen',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
                dangerMode: true,

            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    </script>
@endsection
