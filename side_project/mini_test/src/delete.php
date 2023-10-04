<?php
    define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
    define("FILE_HEADER", ROOT."header.php"); // 해더 패스
    require_once(ROOT."lib/lib.php"); // db관련 라이브러리

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
            $page = isset($_GET["page"]) ? $_GET["page"] : "";
            $arr_err_msg = [];

            if($id === "") {
                $arr_err_msg[] = "Parameter Error : id";
                // throw new Exception("Parameter Error : id");
            }
            if($page === "") {
                // throw new Exception("Parameter Error : page");
                $arr_err_msg[] = "Parameter Error : page";
            }
            if(count($arr_err_msg) >= 1) {
                throw new Exception(implode("<br>", $arr_err_msg));
            }

            //3-1-2. 게시글 정보 획득
            $arr_param = [
                "id" => $id
            ];
            $result = db_select_test_id($conn, $arr_param);

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
                throw new Exception("DB Error : Delete test id");
            }
            $conn->commit();
            header("Location: list.php"); //리스트 페이지로 이동
            exit;
        }


    } catch(Exception $e) {
        if($http_method === "POST") {
            $conn->rollback();
        }
        echo $e->getMessage(); //에러 메세지 출력
        exit; //처리정료
    } finally {

    }

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>삭제 페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
	?>
    <main>
        <table class="delete-page">
            <caption>
                삭제하면 영구적을 복구 할 수 없습니다.
                <br>
                정말로 삭제 하시겠습니까?
                <br><br>
            </caption>
            <tr>
                <th>게시글 번호</th>
                <td><?php echo $item["id"] ?></td>
            </tr>
            <tr>
                <th>작성일</th>
                <td><?php echo $item["creat_at"] ?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><?php echo $item["title"] ?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><?php echo $item["name_t"] ?></td>
            </tr>
        </table>
    </main>
    
        <form class="del-form" action="/mini_test/src/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="delete-b" type="submit">동의</button>
            <a class="a-link" href="/mini_test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
        </form>
   
</body>
</html>