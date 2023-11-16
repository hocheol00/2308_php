@extends('layout.layout')

@section('title', 'list')

@section('main')
<br>
<div class="d-flex justify-content-center">
<a href="{{route('board.create')}}">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16"  data-bs-toggle="modal" data-bs-target="#Modalinsert">
	<path  d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
</svg>
</a>
</div>
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