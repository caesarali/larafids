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

    <title>@yield('title') - Flight Information Display System</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="@yield('bg-color')">
    <div id="app" class="fids">
        <nav class="navbar navbar-top navbar-expand-md navbar-light bg-gradient">
            @yield('brand')
            <div class="navbar-nav ml-auto">
                <h1 class="date text-right pr-3">
                    <div id="day"></div>
                    <div id="date"></div>
                </h1>
                <div class="time" id="time"></div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/fids.js') }}"></script>
</body>
</html>
