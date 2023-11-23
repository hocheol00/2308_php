@extends('layout.layout')

@section('title', 'Registration') 

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('user.registration.post')}}" style="width: 300px;">
		@include('layout.errorlayout')
		@csrf
		{{-- 라라벨에서 폼으로 보낼때 @csrf로 보내야함 --}}
		
		<div class="mb-3">
		  <label for="email" class="form-label">이메일</label>
		  <input type="email" class="form-control w-100" id="email" name="email" >
		</div>
		<div class="mb-3">
		  <label for="password" class="form-label">비밀번호</label>
		  <input type="password" class="form-control" id="password" name="password">
		</div>
		<div class="mb-3">
			<label for="passwordchk" class="form-label">비밀번호 확인</label>
			<input type="password" class="form-control" id="passwordchk" name="passwordchk">
		  </div>
		  <div class="mb-3">
			<label for="name" class="form-label">이름</label>
			<input type="text" class="form-control w-100" id="name" name="name" autocomplete="off">
		  </div>
		<a href="{{route('user.login.get')}}" class="btn btn-dark">취소</a>
		<button type="submit" class="btn btn-dark float-end">회원가입</button>
	  </form>
</main>
@endsection