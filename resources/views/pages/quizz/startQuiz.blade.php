@extends('pages.layout.index')
@section('title')
	{{"test"}}
@endsection

@section('content')
<p>test</p>
<div class="container">
	<ul class="list-group">
		<a href="{{ route('get_quiz')}}"><button>Làm bài</button></a>
	</ul>
</div>

@endsection