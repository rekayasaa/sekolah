@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('custom_js')
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script>
        $("#table-1").dataTable();
    </script>
@endsection
