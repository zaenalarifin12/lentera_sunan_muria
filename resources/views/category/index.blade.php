@extends('layouts.app')

@section('style')
    <link href="{{ asset("assets/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">    
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Kategori</h6>

                    <a href="{{ url("/category/create") }}" class="btn btn-sm btn-success float-right">Tambah</a>
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration  }}</td>                           
                                <td>{{ $item->name  }}</td>
                                <td>
                                    <a href="{{ url("/category/$item->id/edit") }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ url("/category/$item->id") }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset("assets/vendor/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("assets/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset("assets/js/demo/datatables-demo.js")}}"></script>   
    
@endsection
