<div class="table-responsive">
    <table class="table table-hover nowrap bt-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Airline</th>
                <th nowrap>Flight No.</th>
                <th>Route</th>
                <th>Day</th>
                <th nowrap>ETD - ETA</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schedules as $schedule)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $schedule->flight->airline->name }}</td>
                    <td>{{ $schedule->flight->flight_number }}</td>
                    <td>{{ $schedule->flight->origin->code }} - {{ $schedule->flight->destination->code }}</td>
                    <td>{{ $schedule->getDay() }}</td>
                    <td>{{ $schedule->flight->etd }} - {{ $schedule->flight->eta }}</td>
                    <td>
                        <form action="{{ route('schedule.remark', $schedule->id) }}" method="POST" class="form-inline flex-nowrap">
                            @csrf
                            <select class="form-control mr-3" name="status" style="width: 100%" data-remark="{{ $schedule->remark->status ?? 0 }}">
                                @foreach ($statList as $status)
                                    <option value="{{ $loop->index }}" {{ ($schedule->remark->status ?? 0) == $loop->index ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control text-center" style="width: 100%" name="estimated" value="{{ $schedule->remark->estimated ?? '' }}" data-inputmask-alias="datetime" data-inputmask-inputformat="HH:MM" data-inputmask-placeholder="hh:mm" placeholder="On Time">
                            <button type="submit" class="btn btn-link bg-transparant text-secondary invisible"><i class="fas fa-check"></i></button>
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
