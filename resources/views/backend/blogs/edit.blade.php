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
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.news.index')}}">Blog</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.news.update', $blog->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" name="name" value="{{$blog->name}}" required
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter News Title">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="read_time">Read Time</label>
                                            <input type="text" name="read_time" value="{{$blog->read_time}}" required
                                                class="form-control @error('read_time') is-invalid @enderror" id="read_time"
                                                placeholder="Enter Read Time">
                                            @error('read_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            {{-- <textarea name="description" class="form-control"></textarea> --}}
                                            <textarea name="description" required
                                                id="summernote">{!! $blog->description !!}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- radio -->
                                        <label>Featured Blog</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_featured" value="1" 
                                                id="customRadios1" {{ $blog->is_featured == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customRadios1">Yes</label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_featured" value="0"  id="customRadios2" {{ $blog->is_featured == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customRadios2">No</label>
                                            </div>
                                            @error('is_featured')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.news.index') }}" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additional_script')
<script>
    $(document).ready(function(){
        $('#summernote').summernote();
    });
</script>
@endsection