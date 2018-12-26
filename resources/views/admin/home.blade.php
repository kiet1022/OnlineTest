@extends('admin.layout.index')
@section('title')
	{{"Quản lý người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Trang Admin</li>
  </ol>
</nav>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="container">
    <div class="row">
      <div class="card-deck mb-3" style="width: 100%;">
        <div class="card bg-default">
            <a href="{{route('get_edit_user',['id'=>$user->id])}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_edit_user',['id'=>$user->id])}}" class="card-footer bg-success btn btn-success text-white">Thông tin cá nhân</a>
        </div>
        <div class="card bg-default">
            <a href="{{route('get_user_list')}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_user_list')}}" class="card-footer bg-success btn btn-success text-white">Quản lý người dùng</a>
        </div>
        <div class="card bg-default">
            <a href="{{route('get_question_list')}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_question_list')}}" class="card-footer bg-success btn btn-success text-white">Quản lý câu hỏi</a>
        </div>
  </div>
  <div class="card-deck mb-3" style="width: 100%">
      <div class="card bg-default">
            <a href="{{route('get_test_list')}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_test_list')}}" class="card-footer bg-success btn btn-success text-white">Quản lý bài thi</a>
        </div>
        <div class="card bg-default">
            <a href="{{route('get_news_list')}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_news_list')}}" class="card-footer bg-success btn btn-success text-white">Quản lý tin tức</a>
        </div>
        <div class="card bg-default">
            <a href="{{route('get_test_statistic')}}">      
                <div class="card-body text-center">
                <img class="rounded-circle" src="images/admin.jpg" alt="">
                </div>
            </a>
            <a href="{{route('get_test_statistic')}}" class="card-footer bg-success btn btn-success text-white">Thống kê</a>
        </div>
  </div>
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
