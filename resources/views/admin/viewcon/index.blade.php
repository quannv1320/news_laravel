@extends('admin.layouts.main')

@section('content')
    <h1>Thống kê lượt xem</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề bài viết</th>
                    <th>Danh mục</th>
                    <th>Tổng số lượt xem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->artView->views }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection