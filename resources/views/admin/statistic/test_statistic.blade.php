@extends('admin.layout.index')
@section('title')
	{{"Quản lý người dùng"}}
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css">
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
<div class="container">
  <div id="accordion">
    <div class="card">
      <div class="card-header text-white" style="background-color: #29ca8e" class="card-link" data-toggle="collapse" href="#collapseOne">
          Các bài thi có số lượt làm nhiều nhất
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-10 offset-md-1">
                <canvas id="myChart" height="120"></canvas>
            </div>
        </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header text-white" style="background-color: #29ca8e" class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Thống kê số lượng bài thi đã tạo
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
            <div class="col-10 offset-md-1">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="start">Từ tháng</label>
                            <input type="text" id="start" name="beginMonth" class="form-control col-10">
                        </div>
                        <div class="form-group col-5">
                            <label for="end">Đến tháng</label>
                            <input type="text" id="end" name="endMonth" class="form-control col-10" >
                        </div>
                        <div class="form-group col-2" style="padding-top: 33px;">
                            <button type="button" class="btn btn-success" id="btnTestbyMonth">Thống kê</button>
                        </div>
                    </div>
                </form>
                <canvas id="testChart" height="120"></canvas>
            </div>
        </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header text-white" style="background-color: #29ca8e" class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Thống kê số lượt thi
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-10 offset-md-1">
                <div class="form-group">
                    <label for="type">Vui lòng chọn loại thống kê</label>
                    <select id="type" class="form-control">
                        <option value="year">Theo năm</option>
                        <option value="month">Theo tháng</option>
                        {{-- <option value="week">Theo tuần</option> --}}
                    </select>
                </div>
                <div id="filter_type">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="start_year_joined">Từ năm</label>
                                <input type="text" id="start_year_joined" name="beginYear" class="form-control col-10" value="2016">
                            </div>
                            <div class="form-group col-5">
                                <label for="end_year_joined">Đến năm</label>
                                <input type="text" id="end_year_joined" name="endYear" class="form-control col-10" value="2018">
                            </div>
                            <div class="form-group col-2" style="padding-top: 33px;">
                                <button type="button" class="btn btn-success" id="btnJoinedTestNumberbyYear">Thống kê</button>
                            </div>
                        </div>
                    </form>
                </div>
                <canvas id="joinedTestChart" height="120"></canvas>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>    
@endsection
@section('documentready')
    init();
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" integrity="sha256-MZo5XY1Ah7Z2Aui4/alkfeiq3CopMdV/bbkc/Sh41+s=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js" integrity="sha256-rjYnB0Bull7k2XkbJ03UNGqMuMieR769uQVGSSlsi6A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
{{-- <script src="assets/bootstrap-datepicker-dist/dist/js/bootstrap-datepicker.min.js"></script> --}}
    <script src="assets/bootstrap-datepicker-dist/dist/locales/bootstrap-datepicker.vi.min.js" charset="UTF-8"></script>
<script>
function init(){
    getMostJoinedTest();
    getNearestCreatedTest();
    getNumberOfJoinedTestByYear();
    initDatePicker();
}
function initDatePicker(){
    $('#start').datepicker({
        format: "mm",
        startView: 1,
        minViewMode: 1,
        maxViewMode: 1,
        language: "vi",
        autoclose: true
    });
    $('#end').datepicker({
        format: "mm",
        startView: 1,
        minViewMode: 1,
        maxViewMode: 1,
        language: "vi",
        autoclose: true
    });
    $('#start_year_joined').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2,
        language: "vi",
        autoclose: true
    });
    $('#end_year_joined').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2,
        language: "vi",
        autoclose: true
    });
}
function label(data, flag){
    var label = [];
    switch(flag){
        case "mostJoinedTest":
            label = data.map(function(x){
            return x.title;
            }); break;
        case "nearestCreatedTest":
            label = data.map(function(x){
            return "Tháng "+x.month;
            }); break;
        case "numberOfJoinedTestByYear":
            label = data.map(function(x){
            return "Năm "+x.year;
            }); break;
    }
    return label;
}
function number(data, flag){
    var number = [];
    switch(flag){
        case "mostJoinedTest":
            number = data.map(function(x){
            return x.participant_number;
            }); break;
        case "nearestCreatedTest":
            number = data.map(function(x){
            return x.number;
            }); break;
        case "numberOfJoinedTestByYear":
            number = data.map(function(x){
            return x.count;
            }); break;
    }
    return number;
}
function getMostJoinedTest(){
    var ctx = document.getElementById("myChart").getContext('2d');
    var data = @json($mostjoin);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label(data,"mostJoinedTest"),
            datasets: [{
                label: 'số lượt làm bài',
                data: number(data,"mostJoinedTest"),
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
                borderWidth: 2
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
}

function getNearestCreatedTest(){
    var cty = document.getElementById("testChart").getContext('2d');
    var createdTest = @json($createdTest);
    var numTestbyMonthChart = new Chart(cty, {
        type: 'line',
        data: {
            labels: label(createdTest, "nearestCreatedTest"),
            datasets: [{
                label: 'Số bài thi đã tạo',
                data: number(createdTest,"nearestCreatedTest"),
                backgroundColor: [
                'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                'rgba(255, 206, 86, 1)'
                ],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
}

function getNumberOfJoinedTestByYear(){
   var ctz = document.getElementById("joinedTestChart").getContext('2d');
   var numberOfJoinedByYear = @json($numberOfJoinedByYear);
   var numJoinedTestbyMonthChart = new Chart(ctz, {
    type: 'line',
    data: {
        labels: label(numberOfJoinedByYear, "numberOfJoinedTestByYear"),
        datasets: [{
            label: 'Số lượng người tham gia thi',
            data: number(numberOfJoinedByYear, "numberOfJoinedTestByYear"),
            backgroundColor: [
            'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
            'rgba(255, 206, 86, 1)'
            ],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
    });
}

function getMonth(data){
    var arr = [];
    data.forEach(function(e){
        arr.push("Tháng "+e.month);
    });
    return arr;
}
function getNumber(data){
    var arr = [];
    data.forEach(function(e){
        arr.push(e.number);
    });
    return arr;
}
function updateNumberOfTestCreatedChart(data){
    $('#testChart').html();
    var cty = document.getElementById("testChart").getContext('2d');
    label = getMonth(data,"nearestCreatedTest");
    datas = getNumber(data,"nearestCreatedTest");
    var numTestbyMonthChart = new Chart(cty, {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: 'số bài thi được tạo',
            data: datas,
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)'
            ],
        }]
    },
  options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
}

function updateNumberOfJoinedTestChartbyMonth(data){
    $('#joinedTestChart').html('');
    var ctz = document.getElementById("joinedTestChart").getContext('2d');
    var numJoinedTestbyMonthChart = new Chart(ctz, {
    type: 'line',
    data: {
        labels: label(data, "nearestCreatedTest"),
        datasets: [{
            label: 'Số lượng người tham gia thi',
            data: number(data, "numberOfJoinedTestByYear"),
            backgroundColor: [
            'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
            'rgba(255, 206, 86, 1)'
            ],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
}
function updateNumberOfJoinedTestChartbyYear(data){
    $('#joinedTestChart').html('');
    var ctz = document.getElementById("joinedTestChart").getContext('2d');
    var numJoinedTestbyMonthChart = new Chart(ctz, {
    type: 'line',
    data: {
        labels: label(data, "numberOfJoinedTestByYear"),
        datasets: [{
            label: 'Số lượng người tham gia thi',
            data: number(data, "numberOfJoinedTestByYear"),
            backgroundColor: [
            'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
            'rgba(255, 206, 86, 1)'
            ],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
}

$('#btnTestbyMonth').on('click',function(){
    var beginMonth = $("input[name=beginMonth]").val();
    var endMonth = $("input[name=endMonth]").val();
    console.log(endMonth);
            $.ajax({
            url:"{{ route('get_num_test_by_month') }}",
            method:"POST",
            data: {
                'beginMonth':beginMonth,
                'endMonth': endMonth
            }
        })
        .done(function(data){
            var html;
            if(data.success){
                updateNumberOfTestCreatedChart(data.response);
            }else if(!data.success){
                
            }
            $('.messages').html(html);
            
        })
        .fail(function(xhr,status,error){
            console.log(this.url);
            console.log(error);
            console.log(xhr.responseText);
        });
});

$(document).on('click','#btnJoinedTestNumberbyYear', function(){
    var beginYear = $("input[name=beginYear]").val();
    var endYear = $("input[name=endYear]").val();
            $.ajax({
            url:"{{ route('get_num_joined_test_by_year') }}",
            method:"POST",
            data: {
                'beginYear':beginYear,
                'endYear': endYear
            }
        })
        .done(function(data){
            var html;
            if(data.success){
                updateNumberOfJoinedTestChartbyYear(data.response);
            }else if(!data.success){
                
            }
            $('.messages').html(html);
            
        })
        .fail(function(xhr,status,error){
            console.log(this.url);
            console.log(error);
            console.log(xhr.responseText);
        });
});

$(document).on('click','#btnJoinedTestNumberbyMonth', function(){
    var year = $("input[name=year]").val();
    var beginMonth = $("input[id=start_month_joined]").val();
    var endMonth = $("input[id=end_month_joined]").val();
            $.ajax({
            url:"{{ route('get_num_joined_test_by_month') }}",
            method:"POST",
            data: {
                'year': year,
                'beginMonth':beginMonth,
                'endMonth': endMonth
            }
        })
        .done(function(data){
            var html;
            if(data.success){
                updateNumberOfJoinedTestChartbyMonth(data.response);
            }else if(!data.success){
                
            }
            $('.messages').html(html);
            
        })
        .fail(function(xhr,status,error){
            console.log(this.url);
            console.log(error);
            console.log(xhr.responseText);
        });
});
function initYearDatePicker(){
    $('#start_year_joined').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2,
        language: "vi",
        autoclose: true
    });
    $('#end_year_joined').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2,
        language: "vi",
        autoclose: true
    });
}
function initMonthDatePicker(){
    $('#year').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2,
        language: "vi",
        autoclose: true
    });
    $('#start_month_joined').datepicker({
        format: "mm",
        startView: 1,
        minViewMode: 1,
        maxViewMode: 1,
        language: "vi",
        autoclose: true
    });
    $('#end_month_joined').datepicker({
        format: "mm",
        startView: 1,
        minViewMode: 1,
        maxViewMode: 1,
        language: "vi",
        autoclose: true
    });
}
$('#type').on('change', function(){
    var html = '';
    var type = $(this).val();
    if(type == 'year'){
        $('#filter_type>form').remove();
        html += '<form action="#" method="POST">';
        html += '<div class="row">';
        html += '<div class="form-group col-5">';
        html += '<label for="start_year_joined">Từ năm</label>';
        html += '<input type="text" id="start_year_joined" name="beginYear" class="form-control col-10" value="2018"></div>';
        html += '<div class="form-group col-5">';
        html += '<label for="end_year_joined">Đến năm</label>';
        html += '<input type="text" id="end_year_joined" name="endYear" class="form-control col-10" value="2018"></div>';
        html += '<div class="form-group col-2" style="padding-top: 33px;">';
        html += '<button type="button" class="btn btn-success" id="btnJoinedTestNumberbyYear">Thống kê</button></div></div></form>';  
        $('#filter_type').html(html);
         initYearDatePicker();
    }
    if(type == "month"){
         $('#filter_type>form').remove();
        html += '<form action="#" method="POST">';
        html += '<div class="row">';
        html += '<div class="form-group col-3">';
        html += '<label for="year">Chọn năm</label>';
        html += '<input type="text" id="year" name="year" class="form-control col-10" value="2018"></div>';
        html += '<div class="form-group col-3">';
        html += '<label for="start_month_joined">Từ tháng</label>';
        html += '<input type="text" id="start_month_joined" name="beginMonth" class="form-control col-10" value="10"></div>';
        html += '<div class="form-group col-3">';
        html += '<label for="end_month_joined">Đến Tháng</label>';
        html += '<input type="text" id="end_month_joined" name="endMonth" class="form-control col-10" value="12"></div>';
        html += '<div class="form-group col-3" style="padding-top: 33px;">';
        html += '<button type="button" class="btn btn-success" id="btnJoinedTestNumberbyMonth">Thống kê</button></div></div></form>';
        $('#filter_type').html(html);
        initMonthDatePicker();
    }
    // if(type == "week"){
    //     html += '<form action="#" method="POST"><div class="row"><div class="form-group col-3">';
    //     html += '<label for="month">Chọn Tháng</label>';
    //     html += '<select id="month" class="form-control" name="month">';
    //     for(var i = 1; i<= 12; i++){
    //         html += '<option value="'+i+'">Tháng '+i+'</option>';
    //     }
    //     html += '</select></div>';
    //     html += '<div class="form-group col-3">';
    //     html += '<label for="beginWeek">Từ tuần</label>';
    //     html += '<select id="beginWeek" class="form-control" name="beginWeek">';
    //     for(var i = 1; i<= 4 ; i++){
    //         html += '<option value="'+i+'">Tuần '+i+'</option>';
    //     }
    //     html += '</select></div>';
    //     html += '<div class="form-group col-3"><label for="endWeek">Đến tuần</label>';
    //     html += '<select id="endWeek" class="form-control" name="endWeek">';
    //     for(var i = 1; i<= 4 ; i++){
    //         html += '<option value="'+i+'">Tuần '+i+'</option>';
    //     }
    //     html += '</select></div>';
    //     html += '<div class="form-group col-3" style="padding-top: 33px;">';
    //     html += '<button type="button" class="btn btn-success" id="btnJoinedTestNumberbyWeek">Thống kê</button>';
    //     html += '</div></div></form>';
    //     $('#filter_type').html(html);
    // }
});
</script>

@endsection
