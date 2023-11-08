<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('style.css')}}" />

    <title>Belajar-Laravel</title>
</head>
<body>
    @section('header')
        @include('layouts.navbar')
    @show

    @yield('content')

    {{-- Javascript --}}
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>