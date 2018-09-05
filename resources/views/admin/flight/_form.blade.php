@csrf
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Flight - Terminal</label>
    <div class="col-sm-6">
        <input type="text" name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : ''}}" value="{{ strtoupper($type ?? $flight->type) }}" readonly>
        @if ($errors->has('type'))
            <div class="invalid-feedback">
                {{ $errors->first('type') }}
            </div>
        @endif
    </div>
    <div class="col-sm-3">
        <input type="text" name="terminal" class="form-control{{ $errors->has('terminal') ? ' is-invalid' : ''}}" placeholder="Terminal..." value="{{ old('terminal', $flight->terminal ?? '') }}" required>
        @if ($errors->has('terminal'))
            <div class="invalid-feedback">
                {{ $errors->first('terminal') }}
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Airline</label>
    <div class="col-sm-9">
        <select name="airline_id" class="form-control{{ $errors->has('airline_id') ? ' is-invalid' : ''}}">
            <option value="">Choose airline..</option>
            @foreach ($airlines as $airline)
                <option value="{{ $airline->id }}" {{ old('airline_id', $flight->airline_id ?? '') == $airline->id ? 'selected' : '' }}>{{ $airline->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('airline_id'))
            <div class="invalid-feedback">
                {{ $errors->first('airline_id') }}
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Aircraft Type</label>
    <div class="col-sm-4">
        <input type="text" name="aircraft_id" class="form-control{{ $errors->has('aircraft_id') ? ' is-invalid' : ''}}" value="{{ old('aircraft_id', $flight->aircraft_id ?? '') }}" placeholder="Ex: ATR" required>
        @if ($errors->has('aircraft_id'))
            <div class="invalid-feedback">
                {{ $errors->first('aircraft_id') }}
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="flight_number" class="col-sm-3 col-form-label">Flight No.</label>
    <div class="col-sm-4">
        <input type="text" name="flight_number" class="form-control{{ $errors->has('flight_number') ? ' is-invalid' : ''}}" value="{{ old('flight_number', $flight->flight_number ?? '') }}" placeholder="Ex: IW0001" required>
        @if ($errors->has('flight_number'))
            <div class="invalid-feedback">
                {{ $errors->first('flight_number') }}
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Flight Route</label>
    <div class="col-sm-4">
        <select name="origin_id" class="form-control{{ $errors->has('origin_id') ? ' is-invalid' : ''}}">
            @if ((($type ?? $flight->type) == 'departure') && !empty($location))
                <option value="{{ $location->region_id }}">
                    {{ $location->region->code }} - {{ $location->region->name }}
                </option>
            @else
                @foreach ($routes as $route)
                    @if ($loop->first)
                        <option value="">Choose origin..</option>
                    @endif
                    <option value="{{ $route->id }}" {{ old('origin_id', $flight->origin_id ?? '') == $route->id ? 'selected' : '' }}>
                        {{ $route->code }} - {{ $route->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('origin_id'))
            <div class="invalid-feedback">
                {{ $errors->first('origin_id') }}
            </div>
        @endif
    </div>
    <label for="type" class="col-sm-1 col-form-label text-center"><i class="fas fa-arrow-right"></i></label>
    <div class="col-sm-4">
        <select name="destination_id" class="form-control{{ $errors->has('destination_id') ? ' is-invalid' : ''}}">
            @if ((($type ?? $flight->type) == 'arrival') && !empty($location))
                <option value="{{ $location->region_id }}">
                    {{ $location->region->code }} - {{ $location->region->name }}
                </option>
            @else
                @foreach ($routes as $route)
                    @if ($loop->first)
                        <option value="">Choose destination..</option>
                    @endif
                    <option value="{{ $route->id }}" {{ old('destination_id', $flight->destination_id ?? '') == $route->id ? 'selected' : '' }}>
                        {{ $route->code }} - {{ $route->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('destination_id'))
            <div class="invalid-feedback">
                {{ $errors->first('destination_id') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Schedule</label>
    <div class="col-sm-4">
        <div class="input-group" id="departuretime" data-target-input="nearest">
            <input type="text" name="etd" class="form-control datetimepicker-input{{ $errors->has('etd') ? ' is-invalid' : ''}}" value="{{ old('etd', $flight->etd ?? '') }}" data-target="#departuretime" placeholder="Departure" required>
            <div class="input-group-append" data-target="#departuretime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
        </div>
        @if ($errors->has('etd'))
            <div class="invalid-feedback">
                {{ $errors->first('etd') }}
            </div>
        @endif
    </div>
    <label for="type" class="col-sm-1 col-form-label text-center"><i class="fas fa-arrow-right"></i></label>
    <div class="col-sm-4">
        <div class="input-group" id="arrivaltime" data-target-input="nearest">
            <input type="text" name="eta" class="form-control datetimepicker-input{{ $errors->has('eta') ? ' is-invalid' : ''}}" value="{{ old('eta', $flight->eta ?? '') }}" placeholder="Arrival" data-target="#arrivaltime" required>
            <div class="input-group-append" data-target="#arrivaltime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
        </div>
        @if ($errors->has('eta'))
            <div class="invalid-feedback">
                {{ $errors->first('eta') }}
            </div>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Operation Days</label>
    @if ($errors->has('days'))
        <label class="col-sm-8 col-form-label text-danger">Please check a operation day.</label>
    @endif
    <div class="col-sm-4{{ $errors->has('days') ? ' offset-sm-3' : '' }}">
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="1" id="customControlValidation1" {{ isset($flight) && $flight->haveDay('1') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation1">Moday</label>
        </div>
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="2" id="customControlValidation2" {{ isset($flight) && $flight->haveDay('2') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation2">Tuesday</label>
        </div>
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="3" id="customControlValidation3" {{ isset($flight) && $flight->haveDay('3') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation3">Wednesday</label>
        </div>
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="4" id="customControlValidation4" {{ isset($flight) && $flight->haveDay('4') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation4">Thursday</label>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="5" id="customControlValidation5" {{ isset($flight) && $flight->haveDay('5') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation5">Friday</label>
        </div>
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="6" id="customControlValidation6" {{ isset($flight) && $flight->haveDay('6') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation6">Saturday</label>
        </div>
        <div class="custom-control custom-checkbox my-2">
            <input type="checkbox" class="custom-control-input" name="days[]" value="7" id="customControlValidation7" {{ isset($flight) && $flight->haveDay('7') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customControlValidation7">Sunday</label>
        </div>
    </div>
</div>
