<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
</head>
<body>
	<h1>GO HOME!!!</h1>
	<br>
	<form action="/home" method="POST">
		@csrf
		<!-- @csrf 해야 form안에실행이됨 뭐 공격을 막는다  -->
		<button type="submit">POST</button>
	</form>
	<br>
	<br>
	<form action="/home" method="POST">
		<!-- put method 사용할때도  form태그 안에 method는 포스트로 작성하고 변경해야함 -->
		@csrf
		@method('PUT')
		<button type="submit">PUT</button>
	</form>
	<br>
	<br>
	<form action="/home" method="POST">
		<!-- delete method 사용할때도  form태그 안에 method는 포스트로 작성하고 변경해야함 -->
		@csrf
		@method('delete')
		<button type="submit">delete</button>
	</form>
	
</body>
</html>