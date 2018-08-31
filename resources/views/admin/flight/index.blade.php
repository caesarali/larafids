@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="d-flex bd-highlight mb-3">
        <div class="bd-highlight d-none d-sm-inline pt-2">
            <h3 class="d-inline-block text-secondary">Control Panel</h3>
        </div>
        <div class="ml-auto bd-highlight">
            <a href="#" class="btn btn-primary px-4 mr-3">
                <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
            </a>
            <a href="#" class="btn bg-white text-secondary px-4">
                <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
            </a>
        </div>
    </div> --}}
    <div class="mb-3">
        <a href="#" class="btn btn-primary px-4 mr-3">
            <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
        </a>
        <a href="#" class="btn bg-white text-secondary px-4">
            <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
        </a>
    </div>
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
                                <a href="{{ route('flights.create', 'departure') }}" class="btn btn-primary d-inline d-sm-none"> Create </a>
                            </div>
                        </div>
                        <form class="ml-3" action="{{ route('control-panel') }}">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="departureAll" name="d" value="all" {{ !empty($d) ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="custom-control-label font-weight-bold" for="departureAll">Show All Departures Schedule</label>
                            </div>
                        </form>
                        <a href="{{ route('flights.create', 'departure') }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Schedule </a>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departures as $departure)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $departure->flight->airline->name }}</td>
                                <td>{{ $departure->flight->flight_number }}</td>
                                <td>{{ $departure->flight->destination->code }} - {{ $departure->flight->destination->name }}</td>
                                <td>{{ $departure->getDay() }}</td>
                                <td>{{ $departure->flight->etd->format('H:i') }}</td>
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
                                        <input type="text" name="estimated" id="departuretime" data-toggle="datetimepicker" data-target="#departuretime" placeholder="On Time" class="form-control datetimepicker-input">
                                        <button class="btn btn-link bg-transparant text-secondary"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('flights.edit', $departure->flight->id) }}" class="btn bg-transparant text-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('flights.destroy', $departure->flight->id) }}" method="POST" class="d-inline">
                                        @csrf @method('delete')
                                        <button class="btn btn-link bg-transparant text-secondary btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
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
                                <a href="{{ route('flights.create', 'arrival') }}" class="btn btn-primary d-inline d-sm-none"> Create Schedule </a>
                            </div>
                        </div>
                        <form class="ml-3" action="{{ route('control-panel') }}">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="arrivalAll" name="a" value="all" {{ !empty($a) ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="custom-control-label font-weight-bold" for="arrivalAll">Show All Arrivals Schedule</label>
                            </div>
                        </form>
                        <a href="{{ route('flights.create', 'arrival') }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Schedule </a>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arrivals as $arrival)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $arrival->flight->airline->name }}</td>
                                <td>{{ $arrival->flight->flight_number }}</td>
                                <td>{{ $arrival->flight->origin->code }} - {{ $arrival->flight->origin->name }}</td>
                                <td>{{ $arrival->getDay() }}</td>
                                <td>{{ $arrival->flight->etd->format('H:i') }}</td>
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
                                        <input type="text" name="estimated" placeholder="On Time" id="arrivaltime" class="form-control">
                                        <button class="btn btn-link bg-transparant text-secondary"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('flights.edit', $arrival->flight->id) }}" class="btn bg-transparant text-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('flights.destroy', $departure->flight->id) }}" method="POST" class="d-inline">
                                        @csrf @method('delete')
                                        <button class="btn btn-link bg-transparant text-secondary btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
    $('#departuretime').datetimepicker({
        format: 'HH:mm'
    });
    $('#arrivaltime').datetimepicker({
        format: 'HH:mm'
    });
</script>
@endsection
