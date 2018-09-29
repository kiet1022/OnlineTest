@extends('admin.layout.index')
@section('title')
	{{"Quản lý người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý người dùng</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
  </ol>
</nav>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
	<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Loại tài khoản</th>
                <th>Họ Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $us)
            <tr>
                <td>{{$us->username}}</td>
                <td>{{$us->email}}</td>
                <td>
                @if($us->level == 1) 
                    {{"Admin"}}
                @elseif($us->level == 2)
                    {{"Giáo viên"}}
                @else
                    {{"Thành viên"}}
                @endif
                </td>
                <td>{{$us->info->name}}</td>
                <td>{{$us->info->date_of_birth}}</td>
                <td>
                @if($us->info->sex == 1) 
                    {{"Nam"}}
                @elseif($us->info->sex == 2)
                    {{"Nữ"}}
                @else
                    {{"Khác"}}
                @endif   
                </td>
                <td>{{$us->info->phone_number}}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_user',['id'=>$us->id])}}"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{ route('get_edit_user',['id'=>$us->id]) }}"> Chi tiết</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Loại tài khoản</th>
                <th>Họ Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
@endsection
