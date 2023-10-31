<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/src/php/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."../lib/lib.php"); // db관련 라이브러리

$conn = null;
	$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_err_msg = []; // 배열 초기화

	try {
		// DB 접속
		if(!my_db_conn($conn))
		{
			throw new Exception("DB Error : PDO Instance");	
		}
		//총 게시글 수 검색
		$test_cnt = db_select_cnt($conn);
		if($test_cnt === false) {
			throw new Exception("DB Error : SELECT Count");
		}
		//DB 조회시 사용할 데이터 배열
		//게시글 리스트 조회
		$result = my_db_select_paging($conn);
			if(!$result)
			{
				throw new Exception("DB Error : SELECT test");
				exit;
			}
		}
	
		catch(Exception $e) {
			echo $e->getMessage(); 
			// header("Location: list.php");
			exit;
		}
		finally {
			my_db_destroy_conn($conn);
	}

?>



<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/common.css">
</head>
<body>
	 <div class="main">
		<div class="header">TO-DO-LIST</div>
		<div class="content">
			<table class="content-table">
			<?php
				foreach($result as $item)
				{
			?>
				<tr>
					<td class="td-title"><a class="a-link" href="detail.php/?id=<?php echo $item["id"];?>"><?php echo $item["id"];?></a></td>
					<td class="td-content"><a class="a-link" href="detail.php/?id=<?php echo $item["title"];?>"><?php echo $item["title"];?></a></td> 
				</tr>
				
				<?php
				}
			?>
			</table>
		</div>
		<div class="footer">
			<div class="footer-div">
				<a class="menu-trigger" href="#">
					<span></span>
					<span></span>
					<span></span>
					</a>
			</div>
			<div class="insert-box" id="hidden1">
				<a href="insert.php" class="a-insert">insert</a>
				<a href="insert.php" class="a-insert1"></a>
			</div>
			<div class="xcopy-box" id="hidden2">
				<a href="" class="a-insert">xcopy</a>
				<a href="" class="a-insert1"></a>
			</div>
			<div class="xcopy-box2" id="hidden3">
				<a href="" class="a-insert">logn</a>
				<a href="" class="a-insert1"></a>
			</div>
		</div>
	 </div>
	 <script src="../css/common.js"></script>
</body>
</html>