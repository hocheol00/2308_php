<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src");
// define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."/lib/lib.php"); // db관련 라이브러리

$conn = null; //DB 연결용 변수
$id = "";


	// var_dump($id);
$http_method = $_SERVER["REQUEST_METHOD"]; //method 확인
	
	try {
		if(!my_db_conn($conn))
		{
			throw new Exception("DB Error : PDO Instance");	
		}

		//GET Method의 경우
		if($http_method === "GET") {
			$id = isset($_GET["id"]) ? $_GET["id"] : ""; //id셋팅
			//get method의 경우		
			//(상세페이지)게시글 데이터 조회를 위한파라미터 생성
			$arr_param = [
				"id" => $id
			];
			$result = db_select_crud_id($conn, $arr_param);
			//게시글 조회 예외처리
			if($result === false) {
				throw new Exception("DB Error : PDO Select_id");
			} else if(!(count($result) === 1)) {
				throw new Exception("DB Error : PDO Select_id Count," .count($result));
			}
			$item = $result[0];

		} else {

			//post method의 경우
			$id = isset($_POST["id"]) ? $_POST["id"] : ""; //id셋팅
			//get method의 경우		
			// 게시글 수정을 위해 파라미터 셋팅
			$arr_param = [
				"id" => $id
				,"title" => $_POST["title"]
				,"content" => $_POST["content"]
			];

			//게시글 수정 처리
			$conn->beginTransaction(); // 트랜잭션 시작
			if(!db_update_crud_id($conn, $arr_param)) {
				throw new Exception("DB Error : Update_crud_id");
			}
			$conn->commit();
			header("Location: detail.php/?id={$id}"); //디테일 페이지로 이동
			exit;
		}
	} catch(Exception $e) {
		if($http_method === "POST") {
			$conn->rollBack();
		}
		echo $e->getMessage();
		exit;
	} finally {
		my_db_destroy_conn($conn); //db파기
	}
	

	$id = $_GET["id"];
	// // var_dump($id); //확인해보기
	// $page_num=$_GET["page"];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>작성페이지</title>
	<link rel="stylesheet" href="/src/css/common.css">
</head>

<body>
	<div class="main">
		<div class="header"><a href="/src/php/list.php">TO-DO-LIST</a></div>
		<div class="bg">
			<form action="update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<div class="update-date-box">
				<div class="update-date"><? echo $item["create_at"]; ?></div>
				<div class="update-update"><? echo $item["update_at"]; ?></div>
			</div>
				<input type="text" id="title" name="title" value="<?php echo $item["title"] ?>">
				<textarea name="content" id="content" <?php echo $item["content"] ?>></textarea>
				<br>
				<div class="grid">
					<button type="submit">작 성</button>
					<button class="insert-delete" type="button" onclick="location.href='/src/php/list.php'">이 전</button>
					<!-- <a class="insert-delete" href="/src/php/list.php">이전</a> -->
				</div>
			</form>
		</div>
	</div>

	<script src="../css/insert.js"></script>
</body>
</html>