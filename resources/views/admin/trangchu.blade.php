@extends('admin.index')
@section('title')
	{{"Trang chủ"}}
@endsection
@section('content')
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
                <td>+</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Kiet1022</td>
                <td>kiet1022@gmail.com</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>01646356275</td>
                <td>+</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Kiet1022</td>
                <td>kiet1022@gmail.com</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>01646356275</td>
                <td>+</td>
                <td>-</td>
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
