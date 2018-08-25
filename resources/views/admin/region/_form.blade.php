@csrf
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Region</label>
    <div class="col-sm-10">
        <input type="text" name="name" placeholder="Region name..." value="{{ old('name', $region->name ?? '') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">Code</label>
    <div class="col-sm-10">
        <input type="text" name="code" placeholder="Code..." value="{{ old('code', $region->code ?? '') }}" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('code'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
    </div>
</div>