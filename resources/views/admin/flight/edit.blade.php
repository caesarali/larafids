@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('flights.index', $flight->type) }}" class="btn p-0">
                        <i class="fa fa-arrow-left"></i>
                        <span class="ml-1 d-none d-sm-inline">Back</span>
                    </a>
                </div>
                <form action="{{ route('flights.update', $flight->id) }}" method="POST">
                    <div class="card-body">
                        @method('patch')
                        @include('admin.flight._form')
                        <hr>
                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check mr-1"></i> Update Flight Schedule
                            </button>
                        </div>
                    </div>
                </form>
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
