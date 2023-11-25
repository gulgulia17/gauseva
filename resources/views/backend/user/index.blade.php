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
                        <li class="breadcrumb-item active">Users</a></li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>
                            <div class="card-tools">
                                <form>
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="search" value="{{Request()->search}}"
                                            class="form-control float-right" placeholder="Search By Name, Email Or Phone No">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th style="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse($users as $user)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ucwords($user->name)}}</td>
                                        <td>
                                            {{$user->phone}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" data-id="{{$user->id}}"
                                                    data-url="{{ route('admin.user.status', $user->id) }}" {{($user->status == 1)? 'checked' : ''}}
                                                    class="update-status custom-control-input" id="customSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="customSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            {{ date('d/m/Y, h:i', strtotime($user->created_at)) }}
                                        </td>
                                        <td>
                                            <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.user.show', $user->id) }}">
                                                    <button type="button" title="view" class="btn btn-success btn-sm"><i
                                                            class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.user.edit', $user->id) }}">
                                                    <button type="button" title="edit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                            
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" align="center">
                                            No data found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! $users->links() !!}
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
