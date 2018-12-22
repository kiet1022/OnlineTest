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
  <div class="row">
      <div class="col-6">
          <h4>Thống kê các bài thi</h4>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
        </tbody>
    </table>
      </div>
      <div class="col-6">
          <h4>Thống kê học viên</h4>
          <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Loại tài khoản</th>
                <th>Họ Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
            <tr>
                <td>Kiệt</td>
                <td>Gmail</td>
                <td>Admin</td>
                <td>Dương Tuấn Kiệt</td>
                <td>08/08/1997</td>
                <td>Nam</td>
                <td>0123456789</td>
            </tr>
        </tbody>
    </table>
      </div>
  </div>
@endsection
@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" integrity="sha256-MZo5XY1Ah7Z2Aui4/alkfeiq3CopMdV/bbkc/Sh41+s=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js" integrity="sha256-rjYnB0Bull7k2XkbJ03UNGqMuMieR769uQVGSSlsi6A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>
    <script>
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});

</script> --}}

@endsection
