@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin._pills')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="btn btn-light text-secondary">
                        <i class="fas fa-font mr-2"></i> <b>Running Text</b>
                    </div>
                    <button type="button" data-toggle="modal" data-target=".modal" class="btn btn-light text-secondary float-right"><i class="fas fa-edit"></i></button>
                </div>

                <div class="card-body">
                    <h4 class="text-secondary" style="line-height: 2.5rem">{!! $runningtext->text !!}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Running Text</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('running-text.update', $runningtext->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf @method('patch')
                        <textarea name="text" id="mytextarea">{!! $runningtext->text !!}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes !</button>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 200,
        theme: 'modern',
        skin: "lightgray",
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        plugins: [
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "save paste textcolor"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | link",
        image_advtab: false,
    });
</script>
@endsection