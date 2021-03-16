@extends('layouts.app')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h6 class="m-0 d-inline font-weight-bold text-primary">Edit Kategori</h6>
                </div>


            </div>

            <div class="card-body">
                <form action="{{ url("/category/$category->id") }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required />
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-sm btn-primary float-right">Edit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
