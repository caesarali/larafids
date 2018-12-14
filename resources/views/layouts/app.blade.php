<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('favicon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('favicon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('favicon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('favicon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon-16x16.png') }}">

    <title>{{ config('app.name', 'Laravel') }} - Flight Information Display System</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    @yield('styles')
    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <script>
        NProgress.start();
        NProgress.set(0.4);
        NProgress.inc();
        NProgress.configure({ ease: 'ease', speed: 500 });
        NProgress.configure({ trickleSpeed: 800 });
        NProgress.configure({ showSpinner: false });
        NProgress.configure({ parent: '#app' });
        NProgress.done();
    </script>
    @yield('scripts')
    @include('layouts.scripts.swal')
</body>
</html>
