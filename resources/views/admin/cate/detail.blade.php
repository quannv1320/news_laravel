@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-11">
            <h1>Các bài báo {{ $cateName->name }}</h1>
        </div>
        <div class="col-1">
            <a href="{{ route('cate.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh nổi bật</th>
                    <th>Miêu tả ngắn</th>
                    <th>Tác giả</th>
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
                        <td>{{ $article->short_desc }}</td>
                        <td>{{ $article->author }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
@endsection