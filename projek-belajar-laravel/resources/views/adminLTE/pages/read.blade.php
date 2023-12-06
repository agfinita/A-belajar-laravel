@extends('adminLTE.layouts.header')
@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products Data</li>
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
                    {{-- alert --}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container row col mb-2 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success"><a href="{{ url('/create') }}" class="text-decoration-none text-white">
                            <i class="fa-solid fa-add fa-sm"></i> Tambah Data
                        </a></button>

                        <form action="{{ url('/product/search') }}" method="GET" class="d-flex col-3" role="search">
                            <input class="form-control" type="search" name="keyword" placeholder="Search" aria-label="Search" value="{{ $keyword ?? '' }}" autocomplete="off">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-search fa-sm"></i></button>
                        </form>
                    </div>
                    <!-- Table update and delete -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Table Products</h3>
                        </div>
                        <!-- Start table to show product data -->
                        <table class="table table-bordered table-striped table-responsive-md">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $p)
                                    <tr>
                                        <td scope="row">{{ $p->product_name }}</td>
                                        <td scope="row">{{ $p->category_name }}</td>
                                        <td scope="row">{{ $p->product_code }}</td>
                                        <td scope="row">{{ 'Rp ' . $p->price }}</td>
                                        <td scope="row">{{ $p->description }}</td>
                                        <td scope="row">{{ $p->unit }}</td>
                                        <td scope="row">{{ $p->stock }}</td>
                                        <td scope="row">{{ $p->discount }}</td>
                                        <td scope="row">{{ $p->image }}</td>
                                        <td scope="row">
                                            <a href="{{ url('/product/edit/' . $p->id) }}">
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                                </button>
                                            </a>

                                            <form action="{{ url('/product/' . $p->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure delete data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-eraser fa-sm"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End table product -->

                        <!-- Pagination button start -->
                        <div class="d-flex justify-content-between">
                            <ul style="list-style-type: none">
                                <li> {{ 'Data per page: ' . $products->perPage() }} </li>
                                <li> {{ 'Total data: ' . $products->total() }} </li>
                                <li> {{ 'Data show: ' . $products->firstItem() . '-' . $products->lastItem() }} </li>
                            </ul>
                            <div class="mr-5 my-auto">
                                {!! $products->links() !!}
                            </div>
                        </div>
                        <!-- Pagination button finish -->
                    </div>
                    <!-- End card table update and delete -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
