<!doctype html>
<html lang="{{ app()->getLocale() }}">
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

        <title>LARAFIDS - Flight Information Display System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Scrpits -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app" class="blue-bt full-height d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="content">
                        <div class="title">
                            Welcome to
                        </div>
                        <div class="m-b-md">
                            <h2>
                                [ Flight Information Display System ]
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card-group">
                            <a href="{{ route('departures') }}" target="_blank" class="card text-secondary d-none d-sm-inline-block">
                                <div class="card-body">
                                    <h1 class="text-center py-5">
                                        <i class="fas fa-plane-departure fa-2x"></i>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    DEPARTURE
                                </div>
                            </a>
                            <a href="{{ route('arrivals') }}" target="_blank" class="card text-secondary d-none d-sm-inline-block">
                                <div class="card-body">
                                    <h1 class="text-center py-5">
                                        <i class="fas fa-plane-arrival fa-2x"></i>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    ARRIVAL
                                </div>
                            </a>
                            <a href="{{ route('control-panel') }}" class="card text-secondary">
                                <div class="card-body">
                                    <h1 class="text-center py-5">
                                        <i class="fas fa-cog fa-2x"></i>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    CONTROL PANEL
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
