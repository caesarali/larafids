@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin._pills')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas {{ $type == 'departure' ? 'fa-plane-departure' : 'fa-plane-arrival' }} mr-2"></i> <b>{{ strtoupper(str_plural($type)) }}</b>
                    </div>
                    <a href="{{ route(str_plural($type)) }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>

                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <a href="{{ route('flights.create', $type) }}" class="btn btn-primary d-inline d-sm-none"> Create </a>
                            </div>
                        </div>
                        <form class="ml-0 ml-sm-3 mt-3 mt-sm-0" action="{{ url()->current() }}">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="departureAll" name="f" value="all" {{ !empty($f) ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="custom-control-label font-weight-bold" for="departureAll">Show all Flight Schedule</label>
                            </div>
                        </form>
                        <a href="{{ route('flights.create', $type) }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Schedule </a>
                    </div>
                </div>
                <table class="table table-hover nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Flight No.</th>
                            <th scope="col">Flight Route</th>
                            <th scope="col">Day</th>
                            <th scope="col">Time</th>
                            <th scope="col">Remark</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $schedule->flight->airline->name }}</td>
                                <td>{{ $schedule->flight->flight_number }}</td>
                                <td>{{ $schedule->flight->origin->code }} - {{ $schedule->flight->destination->code }}</td>
                                <td>{{ $schedule->getDay() }}</td>
                                <td>
                                    @if ($type == 'departure')
                                        {{ $schedule->flight->etd }}
                                    @elseif($type == 'arrival')
                                        {{ $schedule->flight->eta }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('schedule.remark', $schedule->id) }}" method="POST" class="form-inline flex-nowrap" onsubmit="check(this)">
                                        @csrf
                                        <select class="form-control mr-3" name="status" style="width: 100%" data-remark="{{ $schedule->remark->status ?? 0 }}">
                                            @foreach ($statList as $status)
                                                <option value="{{ $loop->index }}" {{ ($schedule->remark->status ?? 0) == $loop->index ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control text-center" name="estimated" data-estimated="{{ $schedule->remark->estimated ?? '' }}" value="{{ $schedule->remark->estimated ?? '' }}" data-inputmask-alias="datetime" data-inputmask-inputformat="HH:MM" data-inputmask-placeholder="hh:mm" placeholder="On Time">
                                        <button type="submit" class="btn btn-link bg-transparant text-secondary invisible"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('flights.edit', $schedule->flight->id) }}" class="btn bg-transparant text-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form @submit="confirm" action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-link bg-transparant text-secondary"><i class="fas fa-trash"></i></button>
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
<script src="https://cdn.rawgit.com/RobinHerbots/Inputmask/4.x/dist/min/jquery.inputmask.bundle.min.js"></script>
<script>
    function check(form) {
        event.preventDefault();
        let estimated = $(form).find('input[name=estimated]');
        let $estimated = estimated.val();
        let hour1 = $estimated.substr(0,1);
        let hour2 = $estimated.substr(1,1);
        let minute1 = $estimated.substr(3,1);
        let minute2 = $estimated.substr(4,1);
        if (hour1 == 'h' || hour2 == 'h' || minute1 == 'm' || minute2 == 'm') {
            estimated.focus();
        } else {
            form.submit();
        }
    }

    $('select[name=status]').change(function () {
        let estimated = $(this).next('input[name=estimated]');
        let submit = $(this).nextAll('.btn');
        estimated.val('');
        if (this.value != 1) {
            estimated.removeAttr('required');
        } else {
            estimated.focus();
            estimated.attr('required', 'required');
        }

        if (this.value != $(this).data('remark')) {
            submit.removeClass('invisible');
        } else {
            submit.addClass('invisible');
        }
    });

    $('input[name=estimated]').keyup(function () {
        let status = $(this).prev('select[name=status]').val();
        let submit = $(this).nextAll('.btn');
        if (this.value != $(this).data('estimated')) {
            submit.removeClass('invisible');
        } else {
            submit.addClass('invisible');
        }

        if (status != 1) {
            $(this).removeAttr('required');
        } else {
            $(this).attr('required', 'required');
        }
    });

    $("input[name=estimated]").inputmask();

    var table = $('.table').DataTable({
        "pageLength": 25,
        "dom": '<"table-responsive"t><"row p-2 pl-3"<"col-sm-6"l><"col-sm-6"p>>',
        "columnDefs": [
            { "orderable": false, "targets": [6, 7] },
        ]
    });

    $('#key').on('keyup', function () {
        table.search( this.value ).draw();
    });
</script>
@endsection
