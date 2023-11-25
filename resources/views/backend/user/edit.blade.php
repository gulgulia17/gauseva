@extends('backend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
use App\Models\User;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Assign Strategy {{$user->name}}</a></li>
                    </ol>
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
                            <h3 class="card-title">Assign Strategy to {{$user->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="strategy">Strategy</label>
                                            <select class="custom-select" id="strategy" name="strategies[]" multiple="multiple">
                                              <option value="">Please Select</option>
                                                @foreach($strategies as $strategy)
                                                
                                                <option value="{{ $strategy->id }}" 
                                                    @foreach($users->strategies as $strategy_id)
                                                    @if ($strategy->id == $strategy_id->id) selected="selected" @endif @endforeach >
                                                   {{ $strategy->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="{{route('admin.user.index')}}"
                                                class="btn btn-primary btn-sm">Go
                                                Back</a>
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>
@endsection
