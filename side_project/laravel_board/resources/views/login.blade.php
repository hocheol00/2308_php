@extends('layout.layout')

@section('title', 'login')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('user.login.post')}}" style="width: 300px;">
		@include('layout.errorlayout')
		@csrf
		{{-- 라라벨에서 폼으로 보낼때 @csrf로 보내야함 --}}
		<div class="mb-3">
		  <label for="email" class="form-label">이메일</label>
		  <input type="text" class="form-control w-100" id="email" name="email" aria-describedby="emailHelp" autocomplete="off">
		  
		</div>
		<div class="mb-3">
		  <label for="password" class="form-label">비밀번호</label>
		  <input type="password" class="form-control" id="password" name="password">
		</div>
		<button type="submit" class="btn btn-dark">로그인</button>
	  </form>
</main>
@endsection
