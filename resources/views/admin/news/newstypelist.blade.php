@extends('admin.layout.index')
@section('title')
{{"Danh sách loại tin"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách loại tin</li>
</ol>
</nav>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên loại tin</th>
            <th>Số bài viết</th>
            <th>Tên không dấu</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Giáo dục</td>
            <td>2</td>
            <td>Giao-Duc</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
        <tr>
            <td>1</td>
            <td>Giáo dục</td>
            <td>2</td>
            <td>Giao-Duc</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
        <tr>
            <td>1</td>
            <td>Giáo dục</td>
            <td>2</td>
            <td>Giao-Duc</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Tên loại tin</th>
            <th>Số bài viết</th>
            <th>Tên không dấu</th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
@endsection
