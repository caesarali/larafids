@extends('layouts.fids')

@section('title', 'Departures')

@section('bg-color', 'bg-gradient')

@section('brand')
    <div class="navbar-brand">
        <i class="fas fa-plane-departure fa-3x text-white logo"></i>
    </div>
    <h1 class="head-title pl-2">DEPARTURES / KEBERANGKATAN</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <departures></departures>
    </div>
</div>

<runningtext></runningtext>
@endsection
