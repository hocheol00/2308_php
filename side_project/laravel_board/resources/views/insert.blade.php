@extends('layout.layout')

@section('title', 'insert')

@section('main')
<main>
	<br><br>
		<form class="mt-5 mb-5" action="{{route('board.store')}}" method="POST">
		@csrf
		<div>
			<input type="text" class="form-control" placeholder="제목을 입력하세요" name="b_title">
		</div>
		<br>
		<div>
			<textarea class="form-control" id="" cols="10" rows="10" placeholder="내용입력하세요" name="b_content"></textarea>
			<br><br>
		</div>
		<br>
		<div class="d-flex justify-content-between">
			{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button> --}}
			<a href="{{route('board.index')}}" class="btn btn-secondary" data-bs-dismiss="modal">닫기</a>
			<button type="submit" class="text-light btn btn-primary">글작성</button>
			{{-- <button type="button" class="btn btn-primary">글 작성</button> --}}
		</div>
	</form>
</main>
@endsection