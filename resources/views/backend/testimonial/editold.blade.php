@extends('backend.layout.master')
@section('content')
<div class="row pt-4">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit News</h3>
            </div>
            <form method="post" action="{{route('admin.testimonial.update', $testimonial->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$testimonial->name}}" required
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" value="{{$testimonial->position}}"
                                    class="form-control @error('position') is-invalid @enderror" id="position"
                                    placeholder="Enter Position">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feedback">Feedback</label>
                                {{-- <textarea name="feedback" class="form-control"></textarea> --}}
                                <textarea name="feedback"
                                    id="summernote">{!! $testimonial->feedback !!}</textarea>
                                @error('feedback')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
