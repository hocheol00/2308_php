<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
define("ERROR_MSG_PARAM", "제목 : 필수입렵해야함둥"); // 파라미터 에러 메세지
require_once(ROOT."lib/lib.php"); // db관련 라이브러리

$conn = null; //db connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; //method 확인
$arr_err_msg = []; //에러 메세지 저장용
$title= "";
$name_t = "";
// POSt로 request가 왔을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST") {
    try {
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title셋팅
        $name_t =isset($_POST["name_t"]) ? trim($_POST["name_t"]) : ""; //name_t셋팅
        
        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if($name_t === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "name_t");
        }
        // if(count($arr_err_msg) >= 1) {
        //     throw new Exception(implode("<br>", $arr_err_msg));
        // }

        if(count($arr_err_msg) === 0) {

        $arr_post = $_POST;
        $conn = null;

        // DB 접속
	    if(!my_db_conn($conn)) {
            // DB Instance 에러
		    throw new Exception("DB Error : PDO Instance");

	    }
        $conn ->beginTransaction(); //트랜잭션 시작 하는 부분

        //insert
        if(!db_insert_test($conn, $arr_post)) {
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
        header("Location: error.php/?err_msg={$e->getMessage()}");
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
    <link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
	?>
    <div class="box">
        <?php 
            foreach($arr_err_msg as $val) {
        ?>
            <p><?php echo $val ?></p>
        <?php  
            }
        ?>
     <form action="/mini_test/src/insert.php" method="post">
        <!-- <fieldset> -->
            <label for="title">제목</label>
            <input type="text" id = "title" name = "title" value="<?php echo $title ?>">
            <br><br>
            <label for="name_t">내용</label>
            <textarea name="name_t" id="name_t" cols="30" rows="10"><?php echo $name_t ?></textarea>
            <br><br>
            <div class="insert-bot-but">
            <button class="insert-d" type="submit">작성</button>
            <!-- <button type="button" onclick = "location.href '/mini_test/src/list.php'" ="></button> -->
            <a class="insert-d" href="/mini_test/src/list.php">취소</a>
            </div>
            <!-- </fieldset> -->
    </form>
    </div>
</body>
</html>