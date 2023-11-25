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
                        <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">category</a></li>
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
                            <h3 class="card-title">Edit {{ucfirst($category->category)}}'s Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('admin.category.update',$category->id) }}"
                            name="form" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categoryTitleInput" class="text-capitalize">category</label>
                                            <input type="text" name="category_name" class="form-control"
                                                id="categoryTitleInput" placeholder="Enter type title"
                                                value="{{$category->category_name}}" required>
                                            <div class="text-danger" required>{{ $errors->first('type') }}</div>
                                            <span class="text-danger text-capitalize">{{$errors->first()}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="type" class="text-capitalize">Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Select a type</option>
                                                <option value="campaign"  {{ $category->type == 'campaign' ? 'selected' : '' }}>Campaign</option>
                                                <option value="product" {{ $category->type == 'product' ? 'selected' : '' }}>Product</option>
                                            </select>
                                            @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-danger">
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
