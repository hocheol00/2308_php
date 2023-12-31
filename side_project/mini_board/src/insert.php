<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."lib/lib_db.php"); // db관련 라이브러리

// POSt로 request가 왔을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST") {
    try {
        $arr_post = $_POST;
        $conn = null;
        // DB 접속
	    if(!my_db_conn($conn)) {
            // DB Instance 에러
		    throw new Exception("DB Error : PDO Instance");

	    }
        $conn ->beginTransaction(); //트랜잭션 시작 하는 부분

        //insert
        if(!db_insert_boards($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards");
        }

        $conn->commit(); //모든 처리 완료 시 커밋

        //리스트 페이지로 이동
        header("Location: list.php"); // Location: 콜론 이후의 주소로 이동하라는 해더 메세지
        exit;
    } catch(Exception $e) {
        $conn->rollback;
        echo $e->getMessage(); //Exception 메세지 출력
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
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
    require_once(FILE_HEADER);
    ?>
    <form action="/mini_board/src/insert.php" method="post">
        <!-- <fieldset> -->
            <label for="title">제목</label>
            <input type="text" id = "title" name = "title">
            <br>
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <br>
            <button type="submit">작성</button>
            <a href="/mini_board/src/list.php">취소</a>
        <!-- </fieldset> -->
    </form>
</body>
</html>