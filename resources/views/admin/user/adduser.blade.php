@extends('admin.layout.index')
@section('title')
{{"Thêm người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý người dùng</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
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
<form action="{{ route('post_add_user') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Họ tên</label>
      <input type="text" class="form-control" placeholder="Họ và tên" name="name" required="">
    </div>
    <div class="form-group">
      <label for="ipusname">Username</label>
      <input type="text" class="form-control" id="ipusname" aria-describedby="emailHelp" placeholder="Địa chỉ Email" name="email" required="">
      {{-- <small id="emailHelp" class="form-text text-muted">Địa chỉ Email </small> --}}
  </div>
  <div class="form-group">
      <label for="exampleFormControlSelect1">Phân quyền</label>
      <select class="form-control" id="exampleFormControlSelect1" name="level" required="">
        <option value="1">Quản trị viên</option>
        {{-- <option value="2">Giáo viên</option> --}}
        <option value="0">Thành viên</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Đồng ý</button>
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Import excel</button>
</form>
<!-- <div class="alert alert-info mt-3 text-center" role="alert">
    Sau khi tạo thành công tài khoản mật khẩu mặt định của tài khoản là 123456
</div> -->
  <div class="container" style="padding: 0;">
      <div id="demo" class="collapse">
        Vui lòng tải mẫu excel và import theo đúng mẫu.
        <form action="{{route('import_user_by_file')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input class="form-control" type="file" name="file">
          </div>
          <a class="btn btn-warning text-white" href="{{ asset('template/Import_User_Template.xlsx') }}">Tải mẫu Excel</a>
          <button type="submit" class="btn btn-success">Nhập dữ liệu</button>
        </form>
        
      </div>
    </div>
</div>
@endsection
