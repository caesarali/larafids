<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@if(Session::has('alert') && Session::get('alert') == 'swal')
    <script>
        var header = "{!! Session::get('header') !!}";
        var text = "{!! Session::get('text') !!}";
        var type = "{{ Session::get('type', 'info') }}";

        swal(header, text, type);
    </script>
@endif