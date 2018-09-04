@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin._menu')
        <div class="col-md-9">
            <div class="card border-light mb-3">
                <div class="card-body px-2 pb-1 pt-2">
                    <div class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="key" class="form-control" placeholder="Search airline...">
                            <div class="input-group-append">
                                <button class="btn btn-primary d-inline d-sm-none" data-toggle="modal" data-target="#create"> Add Airline </button>
                            </div>
                        </div>
                        <button class="btn btn-primary ml-auto d-none d-sm-inline" data-toggle="modal" data-target="#create"> Add Airline </button>
                    </div>
                </div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="py-2" scope="col"></th>
                            <th class="py-2" scope="col">AIRLINE</th>
                            <th class="py-2" scope="col">CORPORATE</th>
                            <th class="py-2" scope="col">LOGO</th>
                            <th class="py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($airlines as $row)
                            <tr>
                                <td width="10">{{ $loop->iteration }}.</td>
                                <td nowrap>{{ $row->name }}</td>
                                <td nowrap>{{ $row->corporate }}</td>
                                <td width="120">{!! $row->getLogo() !!}</td>
                                <td nowrap class="text-right">
                                    <a href="{{ route('airlines.edit', $row->id) }}" class="btn btn-light text-secondary"><i class="fas fa-edit"></i></a>
                                    <form ref="form" action="{{ route('airlines.destroy', $row->id) }}" method="POST" class="d-inline">
                                        @csrf @method('delete')
                                        <button @click="confirm" type="submit" class="btn btn-light text-secondary btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>
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
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                @include('admin.airline._form')
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Submit Airline</button>
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

@section('scripts')
    @if ($errors->any())
        <script>
            $(".modal").modal('show');
        </script>
    @endif
    <script>
        var table = $('.table').DataTable({
            "dom": '<"table-responsive"t>',
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": 4
                }
            ]
        });

        $('#key').on('keyup', function () {
            table.search( this.value ).draw();
        });

        $(".modal").on('hide.bs.modal', function () {
            $(".modal form input.form-control").val('');
            $(".modal form .invalid-feedback").remove();
            $(".modal").modal('show');
        });
    </script>
@endsection
