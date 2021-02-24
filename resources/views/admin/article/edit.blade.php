@extends('admin.layouts.main')

@section('content')
    <h1>Sửa bài viết</h1>
    <div class="card card-primary">
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="font-weight-bold">Tiêu đề</label>
                      <input type="text" class="form-control" name="title" value="{{ old('title', $oldArt->title) }}">
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
                      <input type="file" class="form-control" name="image" id="exampleInputFile" value="{{ old('image', $oldArt->image) }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputState" class="font-weight-bold">Tác giả</label>
                      <input type="text" name="author" class="form-control" value="{{ old('author', $oldArt->author) }}">
                      @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="font-weight-bold">Miêu tả ngắn</label>
                    <textarea name="short_desc" rows="3" class="form-control">{{ old('short_desc', $oldArt->short_desc) }}</textarea>
                    {{-- @if ($errors->has('short_desc'))
                                <span class="text-danger">{{ $errors->first('short_desc')}}</span>
                    @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2" class="font-weight-bold">Nội dung</label>
                    <textarea name="content" id="editor" rows="5" class="form-control">{{ old('content', $oldArt->content) }}</textarea>
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

@section('page-script')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: '#editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection