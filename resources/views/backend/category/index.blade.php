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
                        <li class="breadcrumb-item active">Category</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i> Add Category</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $key => $category)
                                    <tr>
                                        <td>
                                            {{$key + 1}}
                                        </td>
                                        <td>
                                            {{ucwords($category->category_name)}}
                                        </td>
                                        <td>
                                        {{ ucwords($category->type) }}
                                        </td>
                                        <td>
                                            <form action="{{route('admin.category.destroy',$category->id)}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.category.edit', $category->id) }}">
                                                    <button type="button" title="edit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure  you want ton delete this Category')">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" align="center">
                                            No Data found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    {{$categories->links('pagination::bootstrap-4')}}
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
{{-- <a href="{{ route('admin.category.show', $category->id) }}">
<button type="button" title="view" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>
</button>
</a> --}}
