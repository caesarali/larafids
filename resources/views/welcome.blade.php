<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Scrpits -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                margin-top: -15%;
            }

            .title {
                font-size: 70px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app" class="blue-bt full-height d-flex align-items-center">
            <div class="container">
                <div class="content">
                    <div class="title">
                        Lara<b>FIDS</b>
                    </div>
                    <div class="m-b-md">
                        <h2>
                            [ Flight Information Display System ]
                        </h2>
                    </div>
                    <div class="card-group">
                        <a href="{{ route('departures') }}" target="_blank" class="card text-secondary">
                            <div class="card-body">
                                <h1 class="text-center py-5">
                                    <i class="fas fa-plane-departure fa-3x"></i>
                                </h1>
                            </div>
                            <div class="card-footer text-center">
                                DEPARTURE
                            </div>
                        </a>
                        <a href="{{ route('arrivals') }}" target="_blank" class="card text-secondary">
                            <div class="card-body">
                                <h1 class="text-center py-5">
                                    <i class="fas fa-plane-arrival fa-3x"></i>
                                </h1>
                            </div>
                            <div class="card-footer text-center">
                                ARRIVAL
                            </div>
                        </a>
                        <a href="{{ route('control-panel') }}" class="card text-secondary">
                            <div class="card-body">
                                <h1 class="text-center py-5">
                                    <i class="fas fa-cog fa-3x"></i>
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
    </body>
</html>
