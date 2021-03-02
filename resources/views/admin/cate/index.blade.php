@extends('admin.layouts.main')

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    <h1>Quản lý danh mục</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Miêu tả</th>
                    <th>Số bài viết</th>
                    <th>
                        <div class="text-center"><a href="{{ route('cate.add') }}" class="btn btn-sm btn-success">Thêm mới</a></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ count($category->article) }}</td>
                        <td>
                            <div class="text-center">
                                <a href="{{ route('cate.detail', ['id' => $category->id]) }}" class="btn btn-sm btn-info">Chi tết</a>
                                <a href="{{ route('cate.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                                <a href="" data-toggle="modal" remove-url="{{route('cate.remove', ['id' => $category->id])}}" data-target="#logoutModal" class="btn-remove btn btn-sm btn-danger">Xoá</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body font-weight-bold"><h1>Are you sure?</h1></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="a-remove" class=" btn btn-danger" href="">Delete</a>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('page-script')
<script>
    $('.btn-remove').on('click', function(){
        $('#a-remove').attr('href', $(this).attr('remove-url'));
    })
</script>
@endsection