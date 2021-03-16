@extends('layouts.app')

@section('style')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel="stylesheet" href="{{ asset("assets/css/upload-image.css")}}">

    <link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">

    <script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Buat Postingan</h6>
                </div>


            </div>

            <div class="card-body">
                <form action="{{ url("/post") }}" method="post" enctype="multipart/form-data">
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
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" id="konten" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Kategori</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Penulis</label>
                            <select name="writer_id" id="" class="form-control">
                                @foreach ($writers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>dipublish</label>
                            <input type="date" class="form-control" name="publish" required >
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

    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>

@endsection

