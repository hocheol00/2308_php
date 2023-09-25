<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."lib/lib_db.php"); // db관련 라이브러리

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
    $result = db_select_boards_id($conn, $arr_param);

    //게시글 조회 예외처리
    if($result === false) {
        throw new Exception("DB Error : PDO Select_id");
    } else if(!(count($result) === 1)) {
        // 게시글 조회 count 에러
        throw new Exception("DB Error : PDO Select_id count, ".count($result));
    } 
    $item = $result[0]; // 
} catch(Exception $e) {
    echo $e->getMessage();
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
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>상세페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
    ?>
    <table>
        <div class = "detail-page">
            <tr>
                <th>글 번호</th>
                <td><? echo $item["id"]; ?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><?php echo $item["title"]; ?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><?php echo $item["content"]; ?></td>
            </tr>
            <tr>
                <th>작성일자</th>
                <td><?php echo $item["creat_at"]; ?></td>
            </tr>
        </div>
    </table>
    <div class="d-num">
        <div class="abcd"><a class="d-num-but" href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">이동</a></div>
        <a class="d-num-but" href="/mini_board/src/update.php/?id=<?php echo $id; ?> &page=<?php echo $page_num; ?>">수정</a>
        <a class="d-num-but" href="#">삭제</a>
    </div>
</body>
</html>