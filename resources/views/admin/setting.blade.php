@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('control-panel') }}" class="btn p-0 text-secondary">
                        <i class="fa fa-arrow-left"></i>
                        <span class="ml-1 d-none d-sm-inline">Back to Control Panel</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-username-tab" data-toggle="pill" href="#v-pills-username" role="tab" aria-controls="v-pills-username" aria-selected="true">Username</a>
                                <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">Password</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-username" role="tabpanel" aria-labelledby="v-pills-username-tab">
                                    <form action="{{ route('changeUsername') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">New Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : ''}}" required>
                                                @if ($errors->has('username'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('username') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password_username" class="form-control{{ $errors->has('password_username') ? ' is-invalid' : ''}}" required>
                                                @if ($errors->has('password_username'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password_username') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Change Username</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                                    <form action="{{ route('changePassword') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Current Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="current_password" value="{{ old('current_password') }}" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : ''}}" required>
                                                @if ($errors->has('current_password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('current_password') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}" required>
                                                @if ($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@if ($errors->has('current_password') || $errors->has('password'))
    @section('scripts')
        <script>
            $(function () {
                $('#v-pills-password-tab').tab('show');
            })
        </script>
    @endsection
@endif