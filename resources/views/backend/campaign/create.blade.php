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
                        <li class="breadcrumb-item active">Create</li>
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
                            <h3 class="card-title">Add Campaign</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.campaign.store')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{old('title')}}" required
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            placeholder="Enter Campaign Title">
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
                                            <option value="{{$category->id}}">{{ucwords($category->category_name)}}</option>
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
                                        <label for="product_id">Products</label>
                                        <select name="product_id[]" class="form-control select2" multiple="multiple" id="product_id" data-placeholder="Select a Products">
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{ucwords($product->title)}}</option>
                                        @endforeach
                                        </select>
                                        @error('product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" value="{{old('price')}}" required
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
                                        <input type="text" name="owner_of_campaign" value="{{old('owner_of_campaign')}}" required
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
                                        <input type="text" name="time_duration" value="{{old('time_duration')}}" required
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
                                        <textarea name="description" class="form-control"></textarea>
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
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- radio -->
                                    <label>Featured Campaign</label>
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
