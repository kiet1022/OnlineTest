@extends('admin.layout.index')
@section('title')
{{"Chi tiết kết quả của bài thi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('get_test_list') }}" class="text-info"></a>Danh sách bài thi</li>
    <li class="breadcrumb-item active" aria-current="page">Chi tiết đề thi</li>
</ol>
</nav>
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
    <div class="row">
        <div class="col-4">
            <p><strong>Tên bài thi:</strong> {{$test->title}}</p>
            <p><strong>Số lượng câu hỏi:</strong> {{$test->number_question}}</p>
            <p><strong>Thời gian làm bài:</strong> {{$test->time}}</p>
            <p><strong>Điểm số tối đa:</strong> {{$test->mark}}</p>
        </div>
        <div class="col-4">
            <p><strong>Số lần truy cập:</strong> {{$test->participant_number}}</p>
            <p><strong>Người tạo đề:</strong> {{$test->user->username}}</p>
            <p><strong>Ngày tạo đề:</strong> {{date('d-m-Y',strtotime($test->created_at))}}</p>
            <p><strong>Chủ đề bài thi:</strong> {{$test->topic->title}}</p>
        </div>
    </div>
    <table id="testresult" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Người thi</th>
                <th>Ngày thi</th>
                <th>Thời gian làm bài</th>
                <th>Số câu đúng</th>
                <th>Điểm số</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{$result->user->info->name}}</td>
                <td>{{date('d-m-Y',strtotime($result->created_at))}}</td>
                <td>{{$result->joined_time}}</td>
                <td>{{$result->correct_number}}/{{$result->test->number_question}}</td>
                <td>{{$result->mark}}/{{$result->test->mark}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('documentready')
    $('#testresult').DataTable();
@endsection
{{-- @section('script')
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection --}}