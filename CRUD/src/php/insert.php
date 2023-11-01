<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src/php/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."../lib/lib.php"); // db관련 라이브러리
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/common.css">
	
</head>
<body>
	<div class="main">
		<div class="header">TO-DO-LIST</div>
		<div class="main_insert">
			<form action="">
				<input type="date" value="xxx" min="yyy" max="zzz">
				<input type="text" id="id" placeholder="제목">
				<textarea name="" id="" placeholder="오늘의 내용"></textarea>
				<br>
				<div class="grid">
					<button type="submit">작성</button>
					<button class="insert-delete" onclick="location.href=/src/php/list.php">이 전</button>
					<!-- <a class="insert-delete" href="/src/php/list.php">이전</a> -->
				</div>
			</form>
		</div>
	</div>
</body>
</html>