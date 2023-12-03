@extends('adminLTE.layouts.header')
@section('konten')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $countProduct }}</h3>

                            <p>Jumlah Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalCategories }}</h3>

                            <p>Jumlah Kategori Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalPrice }}</h3>

                            <p>Jumlah Total Harga Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalStock }}</h3>

                            <p>Jumlah Stok Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Produk
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div id="container-1" style="width:100%; height:400px;"></div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line mr-1"></i>
                                Total Harga Produk
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div id="container-2" style="width:100%; height:400px;"></div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                {{-- Right coll --}}
                <section class="col-lg-5 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Stok Produk
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div id="container-3" style="width:100%; height:400px;"></div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </section>
                {{-- /.Right-col --}}
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        // jumlah produk per kategori
        document.addEventListener('DOMContentLoaded', function() {
            const chart = Highcharts.chart('container-1', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Jumlah Produk/Kategori'
                },
                xAxis: {
                    categories: ['Dual Sport', 'Sport', 'Touring', 'Commuter']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah produk'
                    }
                },
                series: [{
                    name: 'Dual Sport',
                    data: [{{ $category1 }}, 0, 0, 0]
                }, {
                    name: 'Sport',
                    data: [0, {{ $category2 }}, 0, 0]
                }, {
                    name: 'Touring',
                    data: [0, 0, {{ $category3 }}, 0]
                }, {
                    name: 'Commuter',
                    data: [0, 0, 0, {{ $category4 }}]
                }]
            });
        });

        // total harga per kategori
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('container-2', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Total Harga Produk/Kategori'
                },
                xAxis: {
                    categories: ['Nov', 'Dec'],
                    accessibility: {
                        description: 'Months of the year'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Total harga (dalam ribuan)'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                        name: 'Dual Sport',
                        marker: {
                            symbol: 'square'
                        },
                        data: [{{ $total1Nov }}, {{ $total1Des }}]

                    }, {
                        name: 'Sport',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: [{{ $total2Nov }}, {{ $total2Des }}]
                    },
                    {
                        name: 'Touring',
                        marker: {
                            symbol: 'star'
                        },
                        data: [{{ $total3Nov }}, 0]
                    },
                    {
                        name: 'Commuter',
                        marker: {
                            symbol: 'oval'
                        },
                        data: [{{ $total4Nov }}, {{ $total4Des }}]
                    }
                ]
            });
        });

        // jumlah stok per kategori
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('container-3', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Stok Produk/Kategori'
                },
                tooltip: {
                    valueSuffix: '%'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Percentage',
                    colorByPoint: true,
                    data: [{
                            name: 'Dual Sport',
                            y: {{ $stock1 }}
                        },
                        {
                            name: 'Sport',
                            y: {{ $stock2 }}
                        },
                        {
                            name: 'Touring',
                            y: {{ $stock3 }}
                        },
                        {
                            name: 'Commuter',
                            y: {{ $stock4 }}
                        }
                    ]
                }]
            });

        })
    </script>
@endsection
