@extends('layouts.fids')

@section('bg-color', 'bg-gradient')

@section('brand')
    <div class="navbar-brand">
        <i class="fas fa-plane-departure fa-3x text-white logo"></i>
    </div>
    <h1 class="head-title pl-2">DEPARTURES</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-hover table-striped">
            <thead class="text-warning">
                <tr>
                    <th width="300">Airline</th>
                    <th>Flight Number</th>
                    <th>Destination</th>
                    <th class="text-center">Terminal</th>
                    <th>Scheduled</th>
                    <th class="text-center pl-0">Remarks</th>
                    <th class="text-center">Estimated</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IW.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center"><span class="badge badge-warning">1</span></td>
                    <td>14.50 AM</td>
                    <td class="bg-info status">ON TIME</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IW.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center"><span class="badge badge-warning">1</span></td>
                    <td>14.50 AM</td>
                    <td class="bg-success status">DEPARTED</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IN.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center"><span class="badge badge-warning">1</span></td>
                    <td>14.50 AM</td>
                    <td class="bg-info status">ON TIME</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IW.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center"><span class="badge badge-warning">1</span></td>
                    <td>14.50 AM</td>
                    <td class="bg-warning status">DELAYED</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IN.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center"><span class="badge badge-warning">1</span></td>
                    <td>14.50 AM</td>
                    <td class="bg-danger status">CANCELED</td>
                    <td class="text-center">On Time</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<nav class="navbar navbar-bottom navbar-expand-md navbar-dark fixed-bottom text-white bg-gradient">
    <marquee scrollamount="15">
        <h1 class="marquee">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam numquam provident nam dicta veritatis, ad omnis harum quasi nobis eius cumque sint delectus, expedita distinctio sit dolore aliquid libero!</h1>
    </marquee>
</nav>
@endsection
