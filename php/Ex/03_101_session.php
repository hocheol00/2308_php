<?php

//session : 데이터를 웹서버를 저장, 쿠키보다 보안성과 속도도 빠름
//개인정보, 민감함 정보들은 되도록 저장하지 말아야한다.

//session 시작
session_name("login"); //특정 세션명으로 시작하는 방법
session_start();

$_SESSION["green"] = "PHP";

//특정 세션 삭제
unset($_SESSION["green"]);

//모든 세션 삭제
// session_destroy();

// print_r($_SESSION);


