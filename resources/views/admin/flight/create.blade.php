@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('control-panel') }}" class="btn p-0">
                        <i class="fa fa-arrow-left"></i>
                        <span class="ml-1 d-none d-sm-inline">Kembali</span>
                    </a>
                </div>
                <form action="{{ route('flight.store', $type) }}" method="POST">
                    <div class="card-body">
                        @include('admin.flight._form')
                        <hr>
                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary mr-1">
                                <i class="fas fa-check mr-1"></i> Submit Flight Schedule
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
