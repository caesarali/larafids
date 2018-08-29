@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
                    </div>
                    <a href="{{ route('departures') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>

                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary d-inline d-sm-none" data-toggle="modal" data-target="#create"> Create Route </button>
                            </div>
                        </div>
                        <form class="ml-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck" name="today">
                                <label class="custom-control-label font-weight-bold" for="customCheck">Only Today</label>
                            </div>
                        </form>
                        <a href="{{ route('flight.create', 'departure') }}" class="btn btn-primary ml-auto d-none d-sm-inline"> Create Route </a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Flight</th>
                            <th scope="col">Route</th>
                            <th scope="col">Day</th>
                            <th scope="col">Time</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Estimated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Wings Air</td>
                            <td>IW1390</td>
                            <td>BDJ-KBU</td>
                            <td>Sunday</td>
                            <td>14.30</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="form-control">
                                        <option selected>On Time</option>
                                        <option>Departed</option>
                                        <option>Delayed</option>
                                        <option>Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" class="form-inline">
                                    <input type="text" class="form-control">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Wings Air</td>
                            <td>IW1390</td>
                            <td>BDJ-KBU</td>
                            <td>Sunday</td>
                            <td>14.30</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="form-control">
                                        <option selected>On Time</option>
                                        <option>Departed</option>
                                        <option>Delayed</option>
                                        <option>Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" class="form-inline">
                                    <input type="text" class="form-control">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Wings Air</td>
                            <td>IW1390</td>
                            <td>BDJ-KBU</td>
                            <td>Sunday</td>
                            <td>14.30</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="form-control">
                                        <option selected>On Time</option>
                                        <option>Departed</option>
                                        <option>Delayed</option>
                                        <option>Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" class="form-inline">
                                    <input type="text" class="form-control">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Wings Air</td>
                            <td>IW1390</td>
                            <td>BDJ-KBU</td>
                            <td>Sunday</td>
                            <td>14.30</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="form-control">
                                        <option selected>On Time</option>
                                        <option>Departed</option>
                                        <option>Delayed</option>
                                        <option>Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" class="form-inline">
                                    <input type="text" class="form-control">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Wings Air</td>
                            <td>IW1390</td>
                            <td>BDJ-KBU</td>
                            <td>Sunday</td>
                            <td>14.30</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="form-control">
                                        <option selected>On Time</option>
                                        <option>Departed</option>
                                        <option>Delayed</option>
                                        <option>Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" class="form-inline">
                                    <input type="text" class="form-control">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
                    </div>
                    <a href="{{ route('arrivals') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>
                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary d-inline d-sm-none" data-toggle="modal" data-target="#create"> Create Route </button>
                            </div>
                        </div>
                        <form class="ml-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck" name="today">
                                <label class="custom-control-label font-weight-bold" for="customCheck">Only Today</label>
                            </div>
                        </form>
                        <button class="btn btn-primary ml-auto d-none d-sm-inline" data-toggle="modal" data-target="#create"> Create Route </button>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Flight</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Scheduled</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Estimated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
