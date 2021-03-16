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
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Penulis</h6>

                    <a href="{{ url("/writer/create") }}" class="btn btn-sm btn-success float-right">Tambah</a>
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
                           @foreach ($writers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                        data-attr="{{ url("writer/$item->id") }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ url("writer/$item->id/edit")  }}" class="btn btn-info btn-sm mx-1" >Edit</a>

                                    <a href="{{ url("/writer/delete/$item->id") }}" class="btn btn-danger btn-sm button delete-confirm">Delete</a>

                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Detail Penulis</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="smallBody">
                            <div>
                                <p id="nama"></p>
                                <img id="image" src="" width="200px" alt="">
                            </div>
                        </div>
                    </div>
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

    <script>
    $('.delete-confirm').on('click', function (event) {
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

    <script>
         $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                // beforeSend: function() {
                //     $('#loader').show();
                // },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    // $('#smallBody').html(result).show();

                    $("#nama").text(result.name)
                    
                    var ass = "{{ url('/') }}" + "/storage/" + result.image
                    $("#image").attr("src", ass);

                },
                // complete: function(result) {
                //     $('#loader').hide();
                    
                // },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>
    
@endsection
