<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src");
// define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."/lib/lib.php"); // db관련 라이브러리

$conn = null;
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
    $result = db_select_crud_id($conn, $arr_param);

    //게시글 조회 예외처리
    if($result === false) {
        throw new Exception("DB Error : PDO Select_id");
    } else if(!(count($result) === 1)) {
        // 게시글 조회 count 에러
        throw new Exception("DB Error : PDO Select_id count, ".count($result));
    } 
    $item = $result[0]; // 
	// var_dump($item);

} catch(Exception $e) {
    echo $e->getMessage();
    // header("Location: list.php");
    // var_dump($_GET);
    exit;
} finally {
    my_db_destroy_conn($conn); //db파기
}

// $input_id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/src/css/common.css">
</head>
<body>
	<div class="main">
		<div class="header" >
		<a href="/src/php/list.php">TO-DO-LIST</a>
		</div>

		<div class="bg">	
			<div class="detail-date-box">
				<div class="detail-date"><? echo $item["create_at"]; ?></div>
				<div class="detail-update"><? echo $item["update_at"]; ?></div>
			</div>
			<div class="title-box2"><? echo $item["title"]; ?></div>
			<div class="content-box2"><?php echo $item["content"]; ?></div>
			<div class="detail-btn-box">
				<button type="button" onclick="location.href='/src/php/update.php?id=<?php echo $id; ?>'">수 정</button>
				<button type="button" onclick="location.href='/src/php/list.php'">이 전</button>
               
				<button type="button" onclick="Delete" id="delete-btn">삭 제</button>
			</div>
		</div>

	 </div>
     <script src="/src/css/delete.js"></script>
</body>
</html>