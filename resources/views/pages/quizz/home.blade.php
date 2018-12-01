@extends('pages.layout.index')
@section('title')
	{{"Trang chủ"}}
@endsection

@section('content')
<p>test</p>
<div class="container">
	<ul class="list-group">
	  <!-- <li class="list-group-item"><a href="{{route('get_quiz',['id'=>2])}}">Test 1</a></li> -->
	  @foreach($tests as $t)
	  <li class="list-group-item"><a href="{{ route('get_test_detail',['id'=> $t->id])}}">{{$t->title}}</a><input type="hidden" name="" value="{{$t->id}}"></li>
	  @endforeach
	</ul>
</div>

@endsection