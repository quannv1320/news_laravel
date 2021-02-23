@extends('admin.layouts.main')

@section('content')
    <h1>Thêm mới bài viết</h1>
    <div class="card card-primary">
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="font-weight-bold">Tiêu đề</label>
                      <input type="text" class="form-control" name="title">
                      @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title')}}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4" class="font-weight-bold">Category</label>
                      <select name="cate_id" class="custom-select">
                        @foreach ($categories as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity" class="font-weight-bold">Ảnh nổi bật</label>
                      <input type="file" class="form-control" name="image" id="exampleInputFile">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputState" class="font-weight-bold">Tác giả</label>
                      <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                      @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="font-weight-bold">Miêu tả ngắn</label>
                    <textarea name="short_desc" rows="3" class="form-control">{{ old('short_desc') }}</textarea>
                    {{-- @if ($errors->has('short_desc'))
                                <span class="text-danger">{{ $errors->first('short_desc')}}</span>
                    @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2" class="font-weight-bold">Nội dung</label>
                    <textarea name="content" id="editor" rows="5" class="form-control">{{ old('content') }}</textarea>
                    {{-- @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content')}}</span>
                    @endif --}}
                  </div>
                  <div class="">
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                    <a href="{{ route('art.index') }}" class="btn btn-danger">Huỷ</a>
                  </div>
            </div>
          </form>
    </div>
@endsection
