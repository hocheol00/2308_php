<?php
//연결 연산자 (.을 붙여야한다)
// $str1 = "안녕";
// $str2 = "하세요.";
// $str3 = $str1.$str2;
// echo $str3

// $str4 = "문자";
// $num1 = 1;
// $str5 = $str4.$num1;
// echo $str5;

// 상수 : 절대 변하지 않는 값 - 상수 이름은 무조건 대문자, 문자열 숫자열 둘다 가능
define("NUM", 100);
define("STR"," "."스트링타입"." ".NUM);
echo NUM, STR;

?>