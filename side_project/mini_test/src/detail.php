<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."lib/lib.php"); // db관련 라이브러리

$page_num=$_GET["page"];

$id = ""; // 게시글 아아디


try {
    
    if(!my_db_conn($conn))
		{
			throw new Exception("DB Error : PDO Instance");	
		}

    // id 확인
    if(!isset($_GET["id"]) || $_GET["id"] === "") {
        throw new Exception("Parameter ERROR : No id");
    }
    
    $id = $_GET["id"];
    //db연결
    if(!my_db_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }

    $arr_param = [
        "id" => $id
    ];

    //(상세페이지)게시글 데이터 조회
    $result = db_select_test_id($conn, $arr_param);

    //게시글 조회 예외처리
    if($result === false) {
        throw new Exception("DB Error : PDO Select_id");
    } else if(!(count($result) === 1)) {
        // 게시글 조회 count 에러
        throw new Exception("DB Error : PDO Select_id count, ".count($result));
    } 
    $item = $result[0]; // 
} catch(Exception $e) {
    // echo $e->getMessage();
    header("Location: error.php/?err_msg={$e->getMessage()}");
    var_dump($_GET);
    exit;
} finally {
    my_db_destroy_conn($conn); //db파기
}

$input_id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>상세페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
	?>
    <div class="detail-page">
    <table>
        
            <tr>
                <td>아이디</td>
                <td><? echo $item["id"]; ?></td>
            </tr>
            <tr>
                <td>제목</td>
                <td><?php echo $item["title"]; ?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><?php echo $item["name_t"]; ?></td>
            </tr>
            <tr>
                <td>작성일자</td>
                <td><?php echo $item["creat_at"]; ?></td>
            </tr>
    </table>
    </div>
    <div class="d-num">
        <a class="insert-c" href="/mini_test/src/list.php/?page=<?php echo $page_num; ?>">이동</a>
        <a class="insert-c" href="/mini_test/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">수정</a>
        <a class="insert-c" href="/mini_test/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">삭제</a>
    </div>

</body>
</html>