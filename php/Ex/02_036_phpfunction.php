<?php

//trim() : 문자열의 공백을 없애주는 함수
// echo "sdsd", "\n", trim(" sdsd ");

// strtoupper //strtolower :문자열을 대/소문자로 변환
// echo strtoupper("asdasd"), strtolower("ASDADS");

// strlen() : 문자열의 길이를반환
// mb_strlen() : 멀티바이트 문자열의 길이를반환
// echo strlen("가나다");
// echo mb_strlen("가나다");

//str_replace : 특정문자를 치환해주는 함수
// echo str_replace("key: ", "/", "key: 123dkvakcl");

// substr() : 문자열을 자르는 함수
// mb_substr() : 멀티바이트 문자열을 자르는 함수
// echo substr("abcdefg", 1, 4);

// strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
// echo strpos("abcdefg", "d");

//isset() : 변수의 존재를 확인하는 함수
// $str = null;
// var_dump( isset($str) );

//empty() : 변수의 값이 비어있는지 확인하는 함수
// var_dump( empty($str) );

// $num = 1;
// settype($num, "string");
// echo gettype($num);

//time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수
echo time();

// date() : 원하는 형식으로 시간 표시해주는 함수
echo date("Y-m-d H:i:s", time());