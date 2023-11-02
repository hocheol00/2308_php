<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src/php/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."../lib/lib.php"); // db관련 라이브러리

$conn = null; //db connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; //method 확인
$arr_err_msg = []; //에러 메세지 저장용
$title= "";
$content = "";
// POSt로 request가 왔을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"];

 // DB 접속
 if(!my_db_conn($conn)) {
	// DB Instance 에러
	throw new Exception("DB Error : PDO Instance");

}
$conn ->beginTransaction(); //트랜잭션 시작 하는 부분


if($http_method === "POST") {
    try {
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title셋팅
        $content =isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content셋팅
        
        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
		// var_dump($title);
        if($content === "") {
			// var_dump($content);
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
        }
        // if(count($arr_err_msg) >= 1) {
        //     throw new Exception(implode("<br>", $arr_err_msg));
        // }

        if(count($arr_err_msg) === 0) {

        $arr_post = $_POST;
        // $conn = null;

        //insert
        if(!db_insert_crud($conn, $arr_post)) {
            throw new Exception("DB Error : Insert test");
        }

        $conn->commit(); //모든 처리 완료 시 커밋

        //리스트 페이지로 이동
        header("Location: list.php"); // Location: 콜론 이후의 주소로 이동하라는 해더 메세지
        exit;
      }

    } catch(Exception $e) {
        if($conn !== null) {
        $conn->rollBack();
        }
        // echo $e->getMessage(); //Exception 메세지 출력
        header("Location: list.php");
        exit;
    } finally {
        my_db_destroy_conn($conn); // db 파기
    }
}



?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>작성페이지</title>
	<link rel="stylesheet" href="../css/common.css">
</head>

<body>
	<div class="main">
		<div class="header"><a href="/src/php/list.php">TO-DO-LIST</a></div>
		<div class="main_insert">
			<form action="insert.php" method="post">
				<input type="date" id="YmdDate">
				<input type="text" id="title" name="title" placeholder="제목" value="<?php echo $title ?>">
				<textarea name="content" id="content" <?php echo $content ?> placeholder="오늘의 내용"></textarea>
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