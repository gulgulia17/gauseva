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
                        <li class="breadcrumb-item active">Contacts</a></li>
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
                            <h3 class="card-title">{{ucwords($contact->name)}} Detail</h3>
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
                                        Name
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ucwords($contact->name)}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <label for="">
                                        Email
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{$contact->email}}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                        Phone No
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{$contact->phone}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <label for="">
                                        Date
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ date('d/m/Y, h:i', strtotime($contact->created_at)) }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                        Contact Created
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        {{ $contact->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">
                                        Message
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        {{ ucfirst($contact->message) }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin.contact.index')}}" class="btn btn-primary btn-sm">Go back</a>
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
