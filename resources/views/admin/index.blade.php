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
        <a href="{{ route('flights.index', 'departure') }}" class="btn bg-white text-secondary px-4 mr-3">
            <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
        </a>
        <a href="{{ route('flights.index', 'arrival') }}" class="btn bg-white text-secondary px-4">
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
                <div class="table-responsive">
                    <table class="table table-hover nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Airline</th>
                                <th scope="col">Flight No.</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Day</th>
                                <th scope="col">Time</th>
                                <th scope="col">Remark</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departures as $schedule)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $schedule->flight->airline->name }}</td>
                                    <td>{{ $schedule->flight->flight_number }}</td>
                                    <td>{{ $schedule->flight->origin->code }} - {{ $schedule->flight->destination->code }}</td>
                                    <td>{{ $schedule->getDay() }}</td>
                                    <td>{{ $schedule->flight->etd->format('H:i') }}</td>
                                    <td>
                                        <form action="{{ route('schedule.remark', $schedule->id) }}" method="POST" class="form-inline flex-nowrap">
                                            @csrf
                                            <select class="form-control mr-3" name="status" style="width: 100%" data-remark="{{ $schedule->remark->status ?? 0 }}">
                                                @foreach ($statList as $status)
                                                    <option value="{{ $loop->index }}" {{ ($schedule->remark->status ?? 0) == $loop->index ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control text-center" name="estimated" value="{{ $schedule->remark->estimated ?? '' }}" data-inputmask-alias="datetime" data-inputmask-inputformat="HH:MM" data-inputmask-placeholder="hh:mm" placeholder="On Time">
                                            <button type="submit" class="btn btn-link bg-transparant text-secondary invisible"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('flights.edit', $schedule->flight->id) }}" class="btn bg-transparant text-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('flights.destroy', $schedule->flight->id) }}" method="POST" class="d-inline">
                                            @csrf @method('delete')
                                            <button class="btn btn-link bg-transparant text-secondary btn-delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="8">Empty Schedule</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
                    </div>
                    <a href="{{ route('arrivals') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Airline</th>
                                <th scope="col">Flight No.</th>
                                <th scope="col">Origin</th>
                                <th scope="col">Day</th>
                                <th scope="col">Time</th>
                                <th scope="col">Remark</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($arrivals as $schedule)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $schedule->flight->airline->name }}</td>
                                    <td>{{ $schedule->flight->flight_number }}</td>
                                    <td>{{ $schedule->flight->origin->code }} - {{ $schedule->flight->destination->code }}</td>
                                    <td>{{ $schedule->getDay() }}</td>
                                    <td>{{ $schedule->flight->etd->format('H:i') }}</td>
                                    <td>
                                        <form action="{{ route('schedule.remark', $schedule->id) }}" method="POST" class="form-inline flex-nowrap">
                                            @csrf
                                            <select class="form-control mr-3" name="status" style="width: 100%" data-remark="{{ $schedule->remark->status ?? 0 }}">
                                                @foreach ($statList as $status)
                                                    <option value="{{ $loop->index }}" {{ ($schedule->remark->status ?? 0) == $loop->index ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control text-center" name="estimated" value="{{ $schedule->remark->estimated ?? '' }}" data-inputmask-alias="datetime" data-inputmask-inputformat="HH:MM" data-inputmask-placeholder="hh:mm" placeholder="On Time">
                                            <button type="submit" class="btn btn-link bg-transparant text-secondary invisible"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('flights.edit', $schedule->flight->id) }}" class="btn bg-transparant text-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('flights.destroy', $schedule->flight->id) }}" method="POST" class="d-inline">
                                            @csrf @method('delete')
                                            <button class="btn btn-link bg-transparant text-secondary btn-delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="8">Empty Schedule</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts')
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
@endsection --}}
