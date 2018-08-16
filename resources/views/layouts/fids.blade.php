<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #212529">
    <div id="app">
        <nav class="navbar navbar-top navbar-expand-md navbar-light bg-primary">
            <div class="navbar-brand">
                <img style="border: white 5px solid; padding: 10px; border-radius: 5px" src="https://png.icons8.com/ios/52/ffffff/airplane-take-off-filled.png">
            </div>
            <h1 class="head-title">DEPARTURES</h1>
        </nav>

        <main>
            @yield('content')
        </main>

        <nav class="navbar navbar-bottom navbar-expand-md navbar-dark fixed-bottom text-white">
            <marquee>
                <h1 class="marquee">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam numquam provident nam dicta veritatis, ad omnis harum quasi nobis eius cumque sint delectus, expedita distinctio sit dolore aliquid libero!</h1>
            </marquee>
        </nav>
    </div>
</body>
</html>
