@extends('admin.layout.index')
@section('title')
{{"Sửa tin tức"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('get_news_list')}}" class="text-info">Danh sách tin tức</a></li>
    <li class="breadcrumb-item" aria-current="page">Sửa tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
  @if(count($errors)>0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach($errors->all() as $err)
        {{$err}}<br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @endforeach
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<form action="{{route('post_edit_news',['id'=>$news->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Tiêu đề</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tiêu đề của bài viết" name="title" value="{{$news->title}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Chọn Loại tin</label>
    <select class="form-control" id="exampleFormControlSelect1" name='id_type'>
      @foreach($newstype as $nt)
      @if($news->id_type == $nt->id)
        <option value="{{$nt->id}}" selected="">{{$nt->name}}</option>
      @else
        <option value="{{$nt->id}}">{{$nt->name}}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tóm tắt</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="summary">{{$news->summary}}</textarea>
  </div>
    <div class="form-group editor">
    <label for="exampleFormControlTextarea2">Nội dung</label>
    <textarea class="form-control editor" id="exampleFormControlTextarea2" rows="3" name="content">{{$news->content}}</textarea>
  </div>
    <div class="form-group" style="width: 50%">
      <label for="old_image">Hình ảnh cũ</label>
      <img class="form-control rounded" src="images/tintuc/{{$news->image}}" alt="" id="old_image">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Hình đính kèm</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>
@endsection
@section('script')
    <script>
     CKEDITOR.replace( 'exampleFormControlTextarea2' );
     CKEDITOR.replace( 'exampleFormControlTextarea1' );
</script>
@endsection