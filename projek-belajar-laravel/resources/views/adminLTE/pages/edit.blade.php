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
                        <li class="breadcrumb-item active">Update Data</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Update Data</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ url('/product/edit/' . $products->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="lbl">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name of product" autocomplete="off"
                                        value="{{ $products->product_name }}" />

                                    @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="category" class="lbl">Category Product</label></br>
                                    <select class="form-control" aria-label="Default select example" id="category"
                                        name="category">
                                        <option value="1"<?php if ($products->category_id == '1') {
                                            echo 'selected';
                                        } ?>> Dual Sport </option>
                                        <option value="2"<?php if ($products->category_id == '2') {
                                            echo 'selected';
                                        } ?>> Sport </option>
                                        <option value="3"<?php if ($products->category_id == '3') {
                                            echo 'selected';
                                        } ?>> Touring </option>
                                        <option value="4"<?php if ($products->category_id == '4') {
                                            echo 'selected';
                                        } ?>> Commuter </option>
                                    </select>

                                    @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('category') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="code" class="lbl">Product Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Enter code of product" autocomplete="off"
                                        value="{{ $products->product_code }}" />

                                    @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('code') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price" class="lbl">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Enter price of product" autocomplete="off"
                                        value="{{ $products->price }}" />

                                    @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" id="desc" name="desc"
                                        placeholder="Enter description of product" autocomplete="off"
                                        value="{{ $products->description }}" />
                                </div>

                                <div class="form-group">
                                    <label for="unit" class="lbl">Unit Product</label>
                                    <input type="text" class="form-control" id="unit" name="unit"
                                        placeholder="Enter unit of product" autocomplete="off"
                                        value="{{ $products->unit }}" />

                                        @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('unit') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="stock" class="lbl">Stock Product</label>
                                    <input type="text" class="form-control" id="stock" name="stock"
                                        placeholder="Enter stock of product" autocomplete="off"
                                        value="{{ $products->stock }}" />

                                    @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('stock') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="disc" class="lbl">Discount</label>
                                    <input type="text" class="form-control" id="disc" name="disc"
                                        placeholder="Enter discount of product" autocomplete="off"
                                        value="{{ $products->discount }}" />

                                        @if (count($errors) > 0)
                                        <div style="width: auto; color:red; margin-top:0.25rem;">
                                            {{ $errors->first('disc') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-success">
                                    Simpan Data
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
