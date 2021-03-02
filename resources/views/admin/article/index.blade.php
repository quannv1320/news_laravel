@extends('admin.layouts.main')

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
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
                    <th>Lượt xem</th>
                    <th>
                        <div class="text-center"><a href="{{ route('art.add') }}" class="btn btn-sm btn-success">Thêm mới</a></div>
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
                        <td>{{ isset($article->artView) ? $article->artView->views : "0" }}</td>
                        {{-- <td>{{ $article->artView->views }}</td> --}}
                        <td>
                            <div class="text-center">
                                <a href="" class="btn btn-sm btn-info">Chi tiết</a>
                                <a href="{{ route('art.edit', ['id' => $article->id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                                <a href="" data-toggle="modal" remove-url="{{route('art.remove', ['id' => $article->id])}}" data-target="#logoutModal" class="btn-remove btn btn-sm btn-danger">Xoá</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links() }}    
    </div>

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