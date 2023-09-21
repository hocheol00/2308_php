<?php
// POST Method

print_r($_POST);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <form action="/04_146_http_post_method.php" method="post">
        <fieldset>
        <label for="id">아이디</label>
        <input type="text" name= "id" id="id">
        <br>
        <label for="pass word">비밀번호</label>
        <input type="password" name= "pass word" id="pass word">
        <br>
        <button type="submit">전송</button>
        </fieldset>
    </form>
</body>
</html>