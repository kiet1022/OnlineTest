@extends('admin.layout.index')
@section('title')
{{"Thêm tin tức"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm tin tức</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tiêu đề</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tiêu đề của bài viết">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Chọn Loại tin</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tóm tắt</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    <div class="form-group editor">
    <label for="exampleFormControlTextarea2">Nội dung</label>
    <textarea class="form-control editor" id="exampleFormControlTextarea2" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Hình đính kèm</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>
@endsection
@section('script')
    <script>
    ClassicEditor.create(document.querySelector('#exampleFormControlTextarea1')).catch( error => 
        {
            console.error( error );
        });
    ClassicEditor.create(document.querySelector('#exampleFormControlTextarea2')).catch( error => 
        {
            console.error( error );
        });
</script>
@endsection