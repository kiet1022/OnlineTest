@extends('admin.layout.index')
@section('title')
	{{"Quản lý người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Thống kê</li>
    <li class="breadcrumb-item active" aria-current="page">Thống kê bài thi</li>
  </ol>
</nav>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="row">
    <div class="col-12">
        <canvas id="myChart" height="120"></canvas>
    </div>
</div>
    
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" integrity="sha256-MZo5XY1Ah7Z2Aui4/alkfeiq3CopMdV/bbkc/Sh41+s=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js" integrity="sha256-rjYnB0Bull7k2XkbJ03UNGqMuMieR769uQVGSSlsi6A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>
    <script>
var ctx = document.getElementById("myChart").getContext('2d');
var data = @json($mostjoin);
function label(){
    var data = @json($mostjoin);
    var label = [];
    label = data.map(function(x){
        return x.title;
    });
    return label;
}
function number(){
    var data = @json($mostjoin);
    var number = [];
    number = data.map(function(x){
        return x.participant_number;
    });
    return number;
}
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label(),
        datasets: [{
            label: 'số lượt làm bài',
            data: number(),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

function updateChart(){
    myChart.data.labels.push(data[0].title);
    myChart.data.datasets.forEach((dataset)=> {
        dataset.data.push(data[0].participant_number);
    });
    myChart.update();
}
</script>

@endsection
