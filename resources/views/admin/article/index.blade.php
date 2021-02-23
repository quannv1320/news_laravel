@extends('admin.layouts.main')

@section('content')
    <h1>Quản lý bài viết</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh nổi bật</th>
                    <th>Thể loại</th>
                    <th>Miêu tả ngắn</th>
                    <th>Tác giả</th>
                    <th>
                        <div class="text-center"><a href="{{ route('art.add') }}" class="btn btn-success">Thêm mới</a></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <img src="{{ asset($article->image) }}" width="70">
                        </td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->short_desc }}</td>
                        <td>{{ $article->author }}</td>
                        <td>
                            <div class="text-center">
                                <a href="" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('art.remove', ['id' => $article->id]) }}" class="btn btn-danger">Xoá</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links() }}
        
    </div>
@endsection