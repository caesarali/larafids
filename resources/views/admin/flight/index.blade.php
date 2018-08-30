@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
                    </div>
                    <a href="{{ route('departures') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>

                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <a href="{{ route('flight.create', 'departure') }}" class="btn btn-primary d-inline d-sm-none"> Create Schedule </a>
                            </div>
                        </div>
                        <form class="ml-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="departureToday" name="today">
                                <label class="custom-control-label font-weight-bold" for="departureToday">Only Today</label>
                            </div>
                        </form>
                        <a href="{{ route('flight.create', 'departure') }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Schedule </a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Flight</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Day</th>
                            <th scope="col">Time</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Estimated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->flight->type == 'departure')
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $schedule->flight->airline->name }}</td>
                                    <td>{{ $schedule->flight->flight_number }}</td>
                                    <td>{{ $schedule->flight->destination->code }} - {{ $schedule->flight->destination->name }}</td>
                                    <td>{{ $schedule->getDay() }}</td>
                                    <td>{{ $schedule->flight->etd->format('H:i') }}</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="form-control">
                                                <option selected>On Time</option>
                                                <option>Departed</option>
                                                <option>Delayed</option>
                                                <option>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="form-inline d-inline">
                                            <input type="text" class="form-control">
                                        </form>
                                        <a href="#" class="btn bg-transparant text-secondary float-right">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
                    </div>
                    <a href="{{ route('arrivals') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>
                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <a href="{{ route('flight.create', 'arrival') }}" class="btn btn-primary d-inline d-sm-none"> Create Schedule </a>
                            </div>
                        </div>
                        <form class="ml-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="arrivalToday" name="today">
                                <label class="custom-control-label font-weight-bold" for="arrivalToday">Only Today</label>
                            </div>
                        </form>
                        <a href="{{ route('flight.create', 'arrival') }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Schedule </a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Flight</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Day</th>
                            <th scope="col">Time</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Estimated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->flight->type == 'arrival')
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $schedule->flight->airline->name }}</td>
                                    <td>{{ $schedule->flight->flight_number }}</td>
                                    <td>{{ $schedule->flight->origin->code }} - {{ $schedule->flight->origin->name }}</td>
                                    <td>{{ $schedule->getDay() }}</td>
                                    <td>{{ $schedule->flight->etd->format('H:i') }}</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="form-control">
                                                <option selected>On Time</option>
                                                <option>Departed</option>
                                                <option>Delayed</option>
                                                <option>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="form-inline d-inline">
                                            <input type="text" class="form-control">
                                        </form>
                                        <a href="#" class="btn bg-transparant text-secondary float-right">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
