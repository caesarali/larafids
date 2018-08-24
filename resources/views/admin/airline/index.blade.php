@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">Airlines</a>
                    <a href="#" class="list-group-item list-group-item-action">Regions</a>
                    <a href="#" class="list-group-item list-group-item-action">User</a>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-3">
                {{-- <div class="card-header form-inline">
                    Airlines
                    <div class="input-group input-group-sm ml-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <a href="{{ route('airlines.create') }}" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#create"> Add Airline </a>
                </div> --}}

                <div class="card-body p-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search airline...">
                        </div>
                        <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#create"> Add Airline </button>
                    </div>
                </div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="py-2" width="10" scope="col"></th>
                            <th class="py-2" scope="col">AIRLINE</th>
                            <th class="py-2" scope="col">CORPORATE</th>
                            <th class="py-2" scope="col">LOGO</th>
                            <th class="py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($airlines as $airline)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $airline->name }}</td>
                                <td>{{ $airline->corporate }}</td>
                                <td width="120">{!! $airline->getLogo() !!}</td>
                                <td class="text-right">
                                    <button class="btn btn-light text-secondary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-light text-secondary"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-light text-secondary"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Airline</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('airlines.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body row justify-content-center">
                        <div class="col-md-8">
                            @include('admin.airline._form')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "ordering": true,
                "info": false,
                "paging": true,
                "pageLength": 25,
                "searching": true,
                "dom": '<"table-responsive"t>',
            });
        });
    </script> --}}
@endsection