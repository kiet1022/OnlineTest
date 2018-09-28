@extends('admin.layout.index')
@section('title')
{{"Danh sách tin tức"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách tin tức</li>
</ol>
</nav>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Thể loại</th>
            <th>Số lượt xem</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr align="center">
            <td>1</td>
            <td>Học đại học
                <p></p>
                <img src="images/admin.jpg" width="100px;">
            </td>
            <td>Đi học đại học nè</td>
            <td>Giáo dục</td>
            <td>20</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
        <tr align="center">
            <td>1</td>
            <td>Học đại học
                <p></p>
                <img src="images/admin.jpg" width="100px;">
            </td>
            <td>Đi học đại học nè</td>
            <td>Giáo dục</td>
            <td>20</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
        <tr align="center">
            <td>1</td>
            <td>Học đại học
                <p></p>
                <img src="images/admin.jpg" width="100px;">
            </td>
            <td>Đi học đại học nè</td>
            <td>Giáo dục</td>
            <td>20</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Thể loại</th>
            <th>Số lượt xem</th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
@endsection
