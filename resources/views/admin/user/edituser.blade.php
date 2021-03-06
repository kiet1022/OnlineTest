@extends('admin.layout.index')
@section('title')
{{"Cập nhật người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý người dùng</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('get_user_list')}}" class="text-info">Danh sách</a></li>
    <li class="breadcrumb-item" aria-current="page">Sửa người dùng</li>
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
<form action="{{ route('post_edit_user',['id'=>$user->id]) }}" method="post">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-12">
          <label for="ipemail">Email</label>
          <input type="email" class="form-control" id="ipemail" placeholder="Email" value="{{$user->email}}" name="email" readonly="">
      </div>
  </div>
  <div class="form-row">
      <div class="form-group col">
          <label for="ipname">Họ tên</label>
          <input type="text" class="form-control" id="ipname" placeholder="Họ tên" value="{{$user->info->name}}" name="name">
      </div>
      <div class="form-group col">
          <label for="ipage">Ngày sinh</label>
          <input type="date" class="form-control" id="ipage" placeholder="Họ tên" value="{{$user->info->date_of_birth}}" name="date_of_birth">
      </div>
      <div class="form-group col">
          <label for="ipsex">Giới tính</label>
          <select name="sex" id="ipsex" class="form-control">
              <option value="1" @if($user->info->sex == 1) {{"selected"}} @endif>Nam</option>
              <option value="2" @if($user->info->sex == 2) {{"selected"}} @endif>Nữ</option>
              <option value="3" @if($user->info->sex == 3) {{"selected"}} @endif>Khác</option>
          </select>
      </div>
  </div>
    <div class="form-row">
      <div class="form-group col">
          <label for="ipaddress">Địa chỉ</label>
          <input type="text" class="form-control" id="ipaddress" placeholder="Địa chỉ" value="{{$user->info->address}}" name="address">
      </div>
      <div class="form-group col">
          <label for="ipphone">Số điện thoại</label>
          <input type="number" class="form-control" id="ipphone" placeholder="Số điện thoại" value="{{$user->info->phone_number}}" name="phone_number">
      </div>
      <div class="form-group col">
          <label for="iplevel">Phân quyền</label>
          <select name="level" id="iplevel" class="form-control">
              <option value="1" @if($user->level == 1) {{"selected"}} @endif>Quản trị viên</option>
              <option value="0" @if($user->level == 0) {{"selected"}} @endif>Thành viên</option>
          </select>
      </div>
  </div>
<button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
@endsection

