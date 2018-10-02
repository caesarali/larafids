@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin._pills')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-departure mr-2"></i> <b>DEPARTURES</b>
                    </div>
                    <a href="{{ route('departures') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>
                @include('admin._flight', ['schedules' => $departures])
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-plane-arrival mr-2"></i> <b>ARRIVALS</b>
                    </div>
                    <a href="{{ route('arrivals') }}" target="_blank" class="btn btn-light text-secondary float-right"><i class="fas fa-external-link-alt"></i></a>
                </div>
                @include('admin._flight', ['schedules' => $arrivals])
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.rawgit.com/RobinHerbots/Inputmask/4.x/dist/min/jquery.inputmask.bundle.min.js"></script>
<script>
    function check(form) {
        event.preventDefault();
        let estimated = $(form).find('input[name=estimated]');
        let $estimated = estimated.val();
        let hour1 = $estimated.substr(0,1);
        let hour2 = $estimated.substr(1,1);
        let minute1 = $estimated.substr(3,1);
        let minute2 = $estimated.substr(4,1);
        if (hour1 == 'h' || hour2 == 'h' || minute1 == 'm' || minute2 == 'm') {
            estimated.focus();
        } else {
            form.submit();
        }
    }

    $('select[name=status]').change(function () {
        let estimated = $(this).next('input[name=estimated]');
        let submit = $(this).nextAll('.btn');
        estimated.val('');
        if (this.value != 1) {
            estimated.removeAttr('required');
        } else {
            estimated.focus();
            estimated.attr('required', 'required');
        }

        if (this.value != $(this).data('remark')) {
            submit.removeClass('invisible');
        } else {
            submit.addClass('invisible');
        }
    });

    $('input[name=estimated]').keyup(function () {
        let status = $(this).prev('select[name=status]').val();
        let submit = $(this).nextAll('.btn');
        if (this.value != $(this).data('estimated')) {
            submit.removeClass('invisible');
        } else {
            submit.addClass('invisible');
        }

        if (status != 1) {
            $(this).removeAttr('required');
        } else {
            $(this).attr('required', 'required');
        }
    });

    $("input[name=estimated]").inputmask();
</script>
@endsection
