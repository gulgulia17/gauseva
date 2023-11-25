@extends('backend.layout.master')
@section('content')
<style>
    .note-toolbar.card-header {
        background: white !important;
        background-color: white;
    }
</style>
<div class="row pt-4">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Create News</h3>
            </div>
            <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="name" value="{{old('name')}}" required
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
                                <input type="text" name="read_time" value="{{old('read_time')}}" required
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
                                <textarea name="description" required id="summernote"></textarea>
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
                                    @php
                                    $checked = '';
                                    $notchecked = '';
                                    if (old('is_featured') == '1') {
                                    $checked = 'checked';
                                    } elseif (old('is_featured') != '1' && old('is_featured') != '0') {
                                    $checked = 'checked';
                                    } else {
                                    $notchecked = 'checked';
                                    }
                                    @endphp
                                  <input class="form-check-input" type="radio" name="is_featured" value="1" 
                                    id="customRadios1" {{ $checked }}>
                                  <label class="form-check-label" for="customRadios1">Yes</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="is_featured" value="0"  id="customRadios2" {{ $notchecked }}>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('additional_script')
<script>
    $(document).ready(function(){
        $('#summernote').summernote();
    });
</script>
@endsection