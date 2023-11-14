@extends('adminLTE.layouts.header')
@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12"><!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->

                        {{-- alert --}}
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- form start -->
                        <form action="{{ url('/master/table') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="category">Category Product</label></br>
                                    <select class="form-control" aria-label="Default select example" id="category"
                                        name="category">
                                        <option value="1"> Sports </option>
                                        <option value="2"> Daily </option>
                                        <option value="3"> Accessories </option>
                                        <option value="4"> Electronic </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Product Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Enter code of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Enter price of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" id="desc" name="desc"
                                        placeholder="Enter description of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="unit">Unit Product</label>
                                    <input type="text" class="form-control" id="unit" name="unit"
                                        placeholder="Enter unit product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="stock">Stock Product</label>
                                    <input type="text" class="form-control" id="stock" name="stock"
                                        placeholder="Enter stock of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="disc">Discount</label>
                                    <input type="text" class="form-control" id="disc" name="disc"
                                        placeholder="Enter discount of product" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                    <label for="image">Image Product</label>
                                    <input type="file" class="form-control-file" name="image" id="image"
                                        name="image[]" multiple />

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-success">
                                    Tambah Data
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
