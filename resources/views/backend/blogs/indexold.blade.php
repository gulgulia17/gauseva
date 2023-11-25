@extends('backend.layout.master')
@section('content')
<div class="row pt-4">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 pb-2 text-right">
                <a href="{{route('admin.news.create')}}" class="btn btn-primary">Add News</a>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Latest News</h3>
                <div class="card-tools">
                    <form>
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="search" value="{{Request()->search}}"
                                class="form-control float-right" placeholder="Search By Name">
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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Is Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($blogs))
                        @php
                        $i = $blogs->perPage() * ($blogs->currentPage() - 1)+1;
                        @endphp
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$blog->name}}</td>
                            @if($blog->is_featured == 1)
                            <td>Yes</td>
                            @else
                            <td>No</td>
                            @endif
                            <td>
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" data-url="{{ route('admin.blog.status', $blog->id) }}"
                                        {{($blog->status == 1)? 'checked' : ''}}
                                        class="update-status custom-control-input" id="customSwitch{{$blog->id}}">
                                    <label class="custom-control-label" for="customSwitch{{$blog->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('admin.news.destroy', $blog->id)}}" method="post">
                                    <a href="{{route('admin.news.edit', $blog->slug)}}">
                                        <div class="fas fa-edit btn btn-sm btn-primary"></div>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this news ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        @if(count($blogs))
        {{$blogs->links()}}
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                Sorry, No Records Found.
            </div>
        </div>
        @endif

        <!-- /.card -->
    </div>
</div>
@endsection
@section('additional_script')
<script>
    $(document).ready(function () {
    $(".update-status").change(function () {
        var url = $(this).data("url");
        var _token = $('input[name="_token"]').val();
        $.post(
            url,
            {
                _token: _token,
            },
            function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'success',
                    title: response.message,
                });
            }
        );
    });
});

</script>
@endsection