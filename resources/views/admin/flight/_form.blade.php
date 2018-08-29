@csrf
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Type</label>
    <div class="col-sm-9">
        <input type="text" name="type" class="form-control" value="{{ strtoupper($type) }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Airline</label>
    <div class="col-sm-9">
        <select name="origin" class="form-control">
            <option value="">Choose airline..</option>
            @foreach ($airlines as $airline)
                <option value="{{ $airline->id }}">{{ $airline->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="flight_number" class="col-sm-3 col-form-label">Flight No.</label>
    <div class="col-sm-4">
        <input type="text" name="flight_number" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Origin - Destination</label>
    <div class="col-sm-4">
        <select name="origin" class="form-control">
            <option value="">Choose origin..</option>
            @foreach ($routes as $route)
                <option value="{{ $route->id }}">{{ $route->code }} - {{ $route->name }}</option>
            @endforeach
        </select>
    </div>
    <label for="type" class="col-sm-1 col-form-label text-center"><i class="fas fa-arrow-right"></i></label>
    <div class="col-sm-4">
        <select name="destination" class="form-control">
            <option value="">Choose destination..</option>
            @foreach ($routes as $route)
                <option value="{{ $route->id }}">{{ $route->code }} - {{ $route->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Schedule</label>
    <div class="col-sm-4">
        <input type="text" name="flight_number" class="form-control" placeholder="Departure" required>
    </div>
    <label for="type" class="col-sm-1 col-form-label text-center"><i class="fas fa-arrow-right"></i></label>
    <div class="col-sm-4">
        <input type="text" name="flight_number" class="form-control" placeholder="Arrival" required>
    </div>
</div>
<div class="form-group row">
    <label for="flight_number" class="col-sm-3 col-form-label">Operation Days</label>
    <div class="col-sm-9">
        <input type="text" name="flight_number" class="form-control" required>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
            <label class="custom-control-label" for="customControlValidation1">Sunday</label>
        </div>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
            <label class="custom-control-label" for="customControlValidation1">Monday</label>
        </div>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
            <label class="custom-control-label" for="customControlValidation1">Thuesday</label>
        </div>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
            <label class="custom-control-label" for="customControlValidation1">Wednesday</label>
        </div>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
            <label class="custom-control-label" for="customControlValidation1">Friday</label>
        </div>
    </div>
</div>