@extends('layout.layout')

@section('title', 'detail')

@section('main')
<main>
	{{-- @forelse($data as $item) --}} 
	{{-- 보드컨트롤러에서 where 주고 값을 불러올려면 forelse를 사용하면됨 --}}
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">{{$data->b_title}}</h5>
			<p class="card-text">{{$data->b_content}}</p>
			<p class="card-text">{{$data->b_hits}}</p>
			<p class="card-text">{{$data->created_at}}</p>
			<p class="card-text">{{$data->updated_at}}</p>
			</div>
		</div>
	{{-- @empty
		<div>게시글 없음</div>
	@endforelse --}}


</main>
@endsection