@extends('layouts.fids')

@section('title', 'Arrivals')

@section('bg-color', 'bg-gradient')

@section('brand')
    <div class="navbar-brand">
        <i class="fas fa-plane-arrival fa-3x text-white logo"></i>
    </div>
    <h1 class="head-title pl-2">ARRIVAL / KEDATANGAN</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <arrivals></arrivals>
    </div>
</div>

<runningtext></runningtext>
@endsection
