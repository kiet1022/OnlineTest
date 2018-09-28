@extends('admin.layout.index')
@section('title')
{{"Thêm loại tin"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm loại tin</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
    <form>
      <div class="form-group">
        <label for="ipnewstype">Tên loại tin</label>
        <input type="text" class="form-control" id="ipnewstype" placeholder="Nhập tên loại tin">
    </div>
    <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>
@endsection
