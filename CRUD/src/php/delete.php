<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src");
// define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."/lib/lib.php"); // db관련 라이브러리

try {
    //2. db connect
    //2-1. connection 함수 호출
    $conn = null; //pdo 객체 변수 

    if(!my_db_conn($conn,)) {
        //2-2. 예외처리
        throw new Exception("DB Error : PDO Instance");
    }
    // Method 획득
    $http_method = $_SERVER["REQUEST_METHOD"];

    if($http_method === "GET") {
        // 3-1 GET 일 경우 (상세 페이지의 삭제 버튼 클릭)
        //3-1-1. 파라미터에서 id 획득
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $arr_err_msg = [];

        if($id === "") {
            $arr_err_msg[] = "Parameter Error : id";
            // throw new Exception("Parameter Error : id");
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        //3-1-2. 게시글 정보 획득
        $arr_param = [
            "id" => $id
        ];
        $result = db_select_crud_id($conn, $arr_param);

        //3-1-3. 예외 처리
        if($result === false) {
            throw new Exception("DB Error : Select id");
        } else if(!(count($result) === 1)) {
            throw new Exception("DB Error : Select id Count");
        }
        $item = $result[0];

    } else {
        // 3-2 POST 일 경우 (상세 페이지의 동의 버튼 클릭)
        // 3-2-1. 파라미터에서 id 획득
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $arr_err_msg = [];
        if($id === "") {
            $arr_err_msg[] = "Parameter Error : id";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        //3-2-2. Transaction 시작
        $conn->beginTransaction();
        //3-2-3 게시글 정보 삭제
        $arr_param = [
            "id" => $id
        ];
        
        //3-2-3. 예외처리
        if(!db_delete_test_id($conn, $arr_param)) {
            throw new Exception("DB Error : Delete crud id");
        }
        $conn->commit();
        header("Location: list.php"); //리스트 페이지로 이동
        exit;
    }


} catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollback();
    }
    // echo $e->getMessage(); //에러 메세지 출력
    echo $e->getMessage();
    exit; //처리정료
} finally {

}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>삭제페이지</title>
	<link rel="stylesheet" href="/src/css/common.css">
</head>

<body>
	<div class="main">
		<div class="header"><a href="/src/php/list.php">TO-DO-LIST</a></div>
		<div class="bg">
			<form action="delete.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="delete-date-box">
				<div class="delete-date"><? echo $item["create_at"]; ?></div>
				<div class="delete-update"><? echo $item["update_at"]; ?></div>
			</div>
				<input type="text" id="title" name="title" value="<?php echo $item["title"] ?>">
				<textarea name="content" id="content" <?php echo $item["content"] ?>></textarea>
				<br>
				<div class="grid">
					<button type="submit">삭 제</button>
					<button class="insert-delete" type="button" onclick="location.href='/src/php/detail.php'">이 전</button>
					<!-- <a class="insert-delete" href="/src/php/list.php">이전</a> -->
				</div>
			</form>
		</div>
	</div>

	
</body>
</html>