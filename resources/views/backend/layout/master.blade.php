<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;" cz-shortcut-listen="true"
    data-success-msg="{{ session('status') }}" data-error-msg="{{ session('error') }}">
    <div class="wrapper">
        @include('backend.layout.header')
        @include('backend.layout.sidebar')
        @yield('content')
        @include('backend.layout.footer')
    </div>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/js/image-preview.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            $('.currency').inputmask({
                alias: 'numeric',
                groupSeparator: ',',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                prefix: '₹ ',
                placeholder: '0',
                rightAlign: false,
                clearMaskOnLostFocus: true,
            });

            $('#summernote').summernote();
        })

        $(".image-upload").on("change", function(e) {
            if ((this).files.length > 1) {
                $(this).siblings(".custom-file-label").addClass("selected").html(`${(this).files.length} files uploaded`);
            } else {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            }

        });
    </script>
    @yield('script')
</body>

</html>
