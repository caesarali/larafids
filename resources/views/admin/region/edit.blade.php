@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin._menu')
        <div class="col-md-9">
            <div class="card border-light mb-3">
                <div class="card-header text-center">
                    <a href="{{ route('regions.index') }}" class="btn p-0 float-left">
                        <i class="fa fa-arrow-left"></i>
                        <span class="ml-1 d-none d-sm-inline">Back</span>
                    </a>
                </div>
                <form action="{{ route('regions.update', $region->id) }}" method="POST">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                @method('patch')
                                @include('admin.region._form')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Save Change!</button>
                                        <a href="{{ route('regions.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection