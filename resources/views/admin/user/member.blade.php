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
	<table id="example" class="table table-striped table-bordered" style="width:100%">
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
            <tr>
                <td>Kiet1022</td>
                <td>kiet1022@gmail.com</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>01646356275</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
            </tr>
            <tr>
                <td>Kiet1022</td>
                <td>kiet1022@gmail.com</td>
                <td>Admin</td>
                <td>Lê Vy Nhật hiếu</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>01646356275</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
            </tr>
            <tr>
                <td>Kiet1022</td>
                <td>kiet1022@gmail.com</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>01646356275</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
            </tr>
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
