@extends('layouts.fids')

@section('title', 'Arrivals')

@section('bg-color', 'bg-gradient')

@section('brand')
    <div class="navbar-brand">
        <i class="fas fa-plane-arrival fa-3x text-white logo"></i>
    </div>
    <h1 class="head-title pl-2">ARRIVALS</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <arrivals></arrivals>
        {{-- <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th width="300">Airline</th>
                    <th>Flight Number</th>
                    <th>Origin</th>
                    <th class="text-center">Terminal</th>
                    <th class="text-center">Scheduled</th>
                    <th class="text-center pl-0">Remarks</th>
                    <th class="text-center">Estimated</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach ($flights as $flight)
                    <tr>
                        <td class="airlines">
                            {!! $flight->airline->getLogo() !!}
                        </td>
                        <td>{{ $flight->flight_number }}</td>
                        <td>{{ $flight->origin->name }}</td>
                        <td class="text-center"><span class="badge badge-warning">{{ $flight->terminal }}</span></td>
                        <td class="text-center">{{ $flight->eta }}</td>
                        <td class="{{ !empty($flight->schedule->remark) ? $flight->schedule->remark->getBackgroundStatus() : 'bg-primary ' }}status animated flipInX slower">
                            {{ !empty($flight->schedule->remark) ? $flight->schedule->remark->getStatus() : 'ON TIME' }}
                        </td>
                        <td class="text-center">{{ $flight->schedule->remark && !empty($flight->schedule->remark->estimated) ? $flight->schedule->remark->estimated : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</div>

<runningtext></runningtext>
@endsection
