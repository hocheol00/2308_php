<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php"); // 해더 패스
require_once(ROOT."lib/lib.php"); // db관련 라이브러리

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/img/test.css">
    <title>에러 페이지</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER);
	?>
    <main class="container">
        <p>페이지를 찾을수 없슴둥</p>
        <p>미안함둥</p>
        <p><?php echo $err_msg ?></p>
        
        <a class="error-b" href="/mini_test/src/list.php">나를 누르라궁 <br>메인으로 가쟈귱!!<br></a>
        
    </main>
</body>
</html>