@extends('layouts.app')

@section('style')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel="stylesheet" href="{{ asset("assets/css/upload-image.css")}}">

@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Tambah Penulis</h6>
                </div>


            </div>

            <div class="card-body">
                <form action="{{ url("/writer") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <div class="alert"></div>
                            <div id='img_container'>
                                <img id="preview" src="{{ asset("assets/img/bg.png") }}" alt="your image" title=''/>
                            </div> 
                            <div class=""> 
                                <div class="custom-file">
                                    <input type="file" name="image" required id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
             
                  
                 
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-sm btn-primary float-right">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <script src="{{ url("assets/js/upload-image.js") }}"></script>


@endsection

