<?php

//두 숫자를 받아서 더해주는 함수만들기
//리턴이없는함수
// function my_sum($a, $b) {
// 	echo $a + $b;
// }

// my_sum(5, 4);

//리턴이 있는 함수
// function my_sum2($a, $b) {
// 	return $a + $b;
// }

// $reslt = my_sum2(1, 2);
// echo $reslt;


// function my_sub($a, $b) {
// 	return $a - $b;
// }
// $reslt = my_sub(3, 2);
// echo "{$reslt}\n";

// function my_mul($a, $b) {
// 	return $a * $b;
// }
// $reslt = my_mul(3, 2);
// echo "{$reslt}\n";

// function my_div($a, $b) {
// 	return $a / $b;
// }
// $reslt = my_div(3, 2);
// echo "{$reslt}\n";

// function my_rem($a, $b) {
// 	return $a / $b;
// }
// $reslt = my_rem(4, 2);
// echo $reslt;


//파라미터의 기본값이 설정되어있는 함수
// 파라미터 세팅 값을 정해준다. 첫번째는 정할수 없다
// 파라미터가 필수인 애들은 앞에두고 디폴트값은 뒤에 배열 해야한다
// function my_sum3($a, $b = 5, $c = 1, $d = 3) {
// 	return $a + $b + $c + $d;
// }

// echo my_sum3(1,2,1);

// 가변 파라미터 php5.6 이상
// function my_args_param(...$items) {
// 	echo $items[0];
// 	print_r ($items);
// }

// my_args_param("a");

//레퍼런스 파라미터

// function test1( $str ) {
// 	$str = "함수 test1";
// 	return $str;
// }
function test2( &$str ) {
	$str = "함수 test2";
	return $str;
}

$str = "???";
$result = test2( $str );
echo $result, "\n";
echo $str;