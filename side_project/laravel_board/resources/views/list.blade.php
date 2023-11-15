@extends('layout.layout')

@section('title', 'list')

@section('main')
<main>
	@forelse($data as $item)
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">{{$item->b_title}}</h5>
			<p class="card-text">{{$item->b_content}}</p>
			<a href="{{route('board.show', ['board' => $item->b_id])}}" class="text-light btn btn-primary">상세</a>
			{{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> --}}
			</div>
		</div>
	@empty
		<div>게시글 없음</div>
	@endforelse


</main>
@endsection