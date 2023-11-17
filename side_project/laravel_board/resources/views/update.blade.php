@extends('layout.layout')

@section('title', 'update')

@section('main')
<main>
	<form class="mt-5 mb-5" action="{{route('board.update', ['board' => $data->b_id])}}" method="POST">
	@method('put')
	@csrf
		<div class="mb-3">
			<input type="text" class="form-control" placeholder="제목을 입력하세요" name="b_title" value="{{$data->b_title}}">
		</div>
		<div class="mb-3">
			<textarea class="form-control" id="" cols="10" rows="10" placeholder="내용입력하세요" name="b_content">{{$data->b_content}}</textarea>
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
			<a href="{{route('board.show', ['board' => $data->b_id])}}" class="btn btn-secondary">취소</a>
			<button type="submit" class="text-light btn btn-primary">수정하기</button>
		</div>
	</form>
</main>
@endsection