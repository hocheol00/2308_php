@extends('layout.layout')

@section('title', 'detail')

@section('main')
<main>
	{{-- @forelse($data as $item) --}} 
	{{-- 보드컨트롤러에서 where 주고 값을 불러올려면 forelse를 사용하면됨 --}}
	<form class="mt-5 mb-5" action="{{route('board.destroy', ['board' => $data->b_id])}}" method="POST">
		@method('delete')
	@csrf
		<div class="mb-3">
			<p>제목</p>
			<p>{{$data->b_title}}</p>
		</div>
		<div class="mb-3">
			<p>내용</p>
			<p>{{$data->b_content}}</p>
		</div>
		<div class="mb-3">
			<p>조회수</p>
			<p>{{$data->b_hits}}</p>
		</div>
		<div class="mb-3">
			<p>작성일</p>
			<p>{{$data->created_at}}</p>
		</div>
		<div class="mb-3">
			<p>수정일</p>
			<p>{{$data->updated_at}}</p>
			<a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
			<a href="{{route('board.edit', ['board' => $data->b_id])}}" class="btn btn-secondary">수정</a>
			<button type="submit" class="text-light btn btn-primary">삭제</button>
		</div>
	</form>
		{{-- @empty
		<div>게시글 없음</div>
	@endforelse --}}
</main>
@endsection

  {{-- <div class="card">
  <div class="card-body">
	<h5 class="card-title">{{$data->b_title}}</h5>
	<p class="card-text">{{$data->b_content}}</p>
	<p class="card-text">{{$data->b_hits}}</p>
	<p class="card-text">{{$data->created_at}}</p>
	<p class="card-text">{{$data->updated_at}}</p>
  </div>
</div> --}}