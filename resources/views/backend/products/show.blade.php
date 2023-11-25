@extends('backend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">{{ucwords($product->title)}} Detail</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                        Title
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ucwords($product->title)}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <label for="">
                                        Date
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ date('d/m/Y, h:i', strtotime($product->created_at)) }}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <label for="">
                                        Product Category
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ $product->category ? $product->category->category_name : "" }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                    Product Created
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ $product->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                        Description
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        {{ ucfirst($product->description) }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin.product.index')}}" class="btn btn-primary btn-sm">Go back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
