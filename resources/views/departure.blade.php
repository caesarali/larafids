@extends('layouts.fids')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <hr class="text-dark">
        <table class="table table-hover table-dark table-striped">
            <thead class="bg-primary">
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
                    <td class="text-center">1</td>
                    <td>14.50 AM</td>
                    <td class="status">ON TIME</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IW.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center">1</td>
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
                    <td class="text-center">1</td>
                    <td>14.50 AM</td>
                    <td class="status">ON TIME</td>
                    <td class="text-center">On Time</td>
                </tr>
                <tr>
                    <td class="airlines">
                        <img src="{{ asset('images/airlines/IW.png') }}" alt="Wings Air" class="img-fluid">
                    </td>
                    <td>IW 1390</td>
                    <td>Banjarmasin</td>
                    <td class="text-center">1</td>
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
                    <td class="text-center">1</td>
                    <td>14.50 AM</td>
                    <td class="bg-danger status">CANCELED</td>
                    <td class="text-center">On Time</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
