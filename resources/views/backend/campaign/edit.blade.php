@extends('backend.layout.master')
@section('content')
    <style>
        .note-toolbar.card-header {
            background: white !important;
            background-color: white;
        }
    </style>
    <div class="content-wrapper">
        <div class="content-header" style=" padding: 7px .5rem !important;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.campaign.index') }}">Campaign</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Campaign</h3>
                            </div>
                            <form method="post" action="{{ route('admin.campaign.update', $campaign->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @include('backend.campaign.form')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        setupImagePreview('.image-upload', '#photo-upload__preview');

        $('.currency').on('change', function() {
            var numericValue = parseFloat($(this).inputmask('unmaskedvalue'));
            $('#price').val(numericValue);
        });
    </script>
@endsection
