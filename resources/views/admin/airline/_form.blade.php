@csrf
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Airline</label>
    <div class="col-sm-10">
        <input type="text" name="name" placeholder="Airline name..." class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="corporate" class="col-sm-2 col-form-label">Corporate</label>
    <div class="col-sm-10">
        <input type="text" name="corporate" placeholder="Corporate or Institution name..." class="form-control{{ $errors->has('corporate') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('corporate'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('corporate') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="picture" class="col-sm-2 col-form-label">Logo</label>
    <div class="col-sm-10">
        <input type="file" name="picture" class="form-control-file border{{ $errors->has('picture') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('picture'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('picture') }}</strong>
            </span>
        @endif
    </div>
</div>