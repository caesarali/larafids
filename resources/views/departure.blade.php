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
            <thead class="thead-dark">
                <tr>
                    <th width="300">Airline</th>
                    <th>Flight Number</th>
                    <th>Destination</th>
                    <th class="text-center">Terminal</th>
                    <th class="text-center">Scheduled</th>
                    <th class="text-center pl-0">Remarks</th>
                    <th class="text-center">Estimated</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach ($schedules as $schedule)
                    <tr>
                        <td class="airlines">
                            {!! $schedule->flight->airline->getLogo() !!}
                        </td>
                        <td>{{ $schedule->flight->flight_number }}</td>
                        <td>{{ $schedule->flight->destination->name }}</td>
                        <td class="text-center"><span class="badge badge-warning">{{ $schedule->flight->terminal }}</span></td>
                        <td class="text-center">{{ $schedule->flight->etd }}</td>
                        <td class="{{ !empty($schedule->remark) ? $schedule->remark->getBackgroundStatus() : 'bg-primary ' }}status animated flipInX slower">
                            {{ !empty($schedule->remark) ? $schedule->remark->getStatus() : 'ON TIME' }}
                        </td>
                        <td class="text-center">{{ $schedule->remark && !empty($schedule->remark->estimated) ? $schedule->remark->estimated : '-' }}</td>
                    </tr>
                @endforeach
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
