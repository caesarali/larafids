<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Flight Information Display System</title>

    <script src="{{ asset('js/fids.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="@yield('bg-color')">
    <div id="app" class="fids">
        <nav class="navbar navbar-top navbar-expand-md navbar-light bg-gradient">
            @yield('brand')
            <div class="navbar-nav ml-auto">
                <h1 class="date text-right pr-3">
                    {{-- {{ date('l') }}<br>
                    {{ date('j F, Y') }} --}}
                    {{-- @{{ day }}<br>
                    @{{ date }} --}}
                    <span id="day"></span>
                    <span id="date"></span>
                </h1>
                <div class="time" id="time"></div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
