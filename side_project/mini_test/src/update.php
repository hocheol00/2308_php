<?php
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	define("FILE_HEADER", ROOT."header.php"); // 해더 패스
	require_once(ROOT."lib/lib.php"); // db관련 라이브러리

	$conn = null; //DB 연결용 변수
	$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; //id셋팅
	$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; //page셋팅
	$http_method = $_SERVER["REQUEST_METHOD"]; //method 확인
	
	try {
		if(!my_db_conn($conn))
		{
			throw new Exception("DB Error : PDO Instance");	
		}

		//GET Method의 경우
		if($http_method === "GET") {
			//get method의 경우		
			//(상세페이지)게시글 데이터 조회를 위한파라미터 생성
			$arr_param = [
				"id" => $id
			];
			$result = db_select_test_id($conn, $arr_param);
			//게시글 조회 예외처리
			if($result === false) {
				throw new Exception("DB Error : PDO Select_id");
			} else if(!(count($result) === 1)) {
				throw new Exception("DB Error : PDO Select_id Count," .count($result));
			}
			$item = $result[0];

		} else {
			//post method의 경우
			// 게시글 수정을 위해 파라미터 셋팅
			$arr_param = [
				"id" => $id
				,"title" => $_POST["title"]
				,"name_t" => $_POST["name_t"]
			];

			//게시글 수정 처리
			$conn->beginTransaction(); // 트랜잭션 시작
			if(!db_update_test_id($conn, $arr_param)) {
				throw new Exception("DB Error : Update_test_id");
			}
			$conn->commit();
			header("Location: detail.php/?id={$id}&page={$page}"); //디테일 페이지로 이동
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
	<link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>수정페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
	?>
    <form action="/mini_test/src/update.php" method="post">
			<table class="box">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="hidden" name="page" value="<?php echo $page ?>">
				
					<tr>
						<th>글 번호</th>
						<td class="num1"><? echo $item["id"]; ?></td>
					</tr>
					<tr>
						<th>제목</th>
						<td>
						<br><input type="text" name="title" value="<?php echo $item["title"] ?>">
						</td>
					</tr>
					<br>
					<tr>
						<th>내용</th>
						<td>
							<br><textarea name="name_t" id="name_t" cols="40" rows="10"><?php echo $item["name_t"] ?></textarea>
						</td>
					</tr>
				
			</table>
			
			<div class="d-num">
				<button class="d-num-but" type="submit">수정확인</button>
				<a class="d-num-but" href="/mini_test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
			</div>
		</form>
		
</body>
</html>