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
                        <li class="breadcrumb-item"><a href="{{route('admin.campaign.index')}}">Campaign</a></li>
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
                            <h3 class="card-title">Edit Campaign</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.campaign.update', $campaign->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" value="{{$campaign->title}}" required
                                                class="form-control @error('title') is-invalid @enderror" id="title"
                                                placeholder="Enter Title">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Campaign Category</label>
                                            <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"  @selected($campaign->category_id == $campaign->id)>{{ucwords($campaign->category_name)}}</option>
                                            @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" value="{{$campaign->price}}" required
                                                class="form-control @error('price') is-invalid @enderror" id="price"
                                                placeholder="Enter Price">
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="owner_of_campaign">Campaign Owner</label>
                                            <input type="text" name="owner_of_campaign" value="{{$campaign->owner_of_campaign}}" required
                                                class="form-control @error('owner_of_campaign') is-invalid @enderror" id="owner_of_campaign"
                                                placeholder="Enter owner of campaign">
                                            @error('owner_of_campaign')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time_duration">Time Duration</label>
                                            <input type="text" name="time_duration" value="{{$campaign->time_duration}}" required
                                                class="form-control @error('time_duration') is-invalid @enderror" id="time_duration"
                                                placeholder="Enter Time Duration">
                                            @error('time_duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control">
                                                {!! $campaign->description !!}
                                            </textarea>
                                            <!-- <textarea name="description" required
                                                id="summernote">{!! $campaign->description !!}</textarea> -->
                                            @error('description')
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
                                    <div class="col-sm-6">
                                        <!-- radio -->
                                        <label>Featured</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_featured" value="1"
                                                id="customRadios1" {{ $campaign->is_featured == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customRadios1">Yes</label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_featured" value="0"  id="customRadios2" {{ $campaign->is_featured == '0' ? 'checked' : '' }}>
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
                                <a href="{{ route('admin.campaign.index') }}" class="btn btn-danger">
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
