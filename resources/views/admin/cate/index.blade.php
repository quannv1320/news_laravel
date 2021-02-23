@extends('admin.layouts.main')

@section('content')
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
                        <div class="text-center"><a href="{{ route('cate.add') }}" class="btn btn-success">Thêm mới</a></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td></td>
                        <td>
                            <div class="text-center">
                                <a href="{{ route('cate.edit', ['id' => $category->id]) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{route('cate.remove', ['id' => $category->id])}}" class="btn btn-danger">Xoá</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection