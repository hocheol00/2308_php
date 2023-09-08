<?php
//음식 종류 5개 이상을 인덱스 배열로 만들어주세여
// $arr1 = array("딸기", "사과", "배", "포도", "메론");
// var_dump ($arr1);

//키는 요리명, 값은 주재료 하나 로 이루어진 배열을 만들어주세요(배열 길이 4)

// $arr2 = [
// 	"볶음밥" => "밥"
// 	,"소고기" => "소"
// 	,"삼겹살" => "돼지"
// 	,"치킨" => "닭"
// ];
// var_dump($arr2["볶음밥"]);
// echo $arr2["소고기"];
// echo count($arr2); arr의 배열 수 를 알려주는 함수

// unset() : 배열의 원소 삭제
// $arr_week = ["Sun", "Mon", "delete", "Tue", "Wen"];

// unset($arr_week[2]);
// var_dump($arr_week);
// print_r($arr_week);

//배열의 정렬 : asort(), arsort(), ksort(), krsort()
// asort() : 배열의 값을 오름차순 정렬
// $arr_asort = ["b", "a", "d", "c"];
// asort($arr_asort); 정렬하고싶은 것에 함수를 주고
// print_r( $arr_asort ); 확인을 하면 정렬이 되었있다

// arsort() : 배열의 값을 내림차순 정렬
// $arr_arsort = ["b", "a", "d", "c"];
// arsort($arr_asort);
// print_r( $arr_asort );

// ksort() : 배열의 키를 오름차순 정렬
// $arr_ksort = [
// 	"b" => "1"
// 	,"d" => "2"
// 	,"a" => "3"
// 	,"c" => "4"
// ];
// ksort($arr_ksort);
// print_r($arr_ksort);

// krsort() : 배열의 키를 내림차순 정렬
// krsort($arr_ksort);
// print_r($arr_ksort);

// count() : 배열 혹은 그 외 것들의 사이즈를 반환하는 함수
// echo count($arr_week);

// array_diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
// $arr_diff1 = [1, 2, 3];
// $arr_diff2 = [1, 4, 5];
// $arr_diff = array_diff($arr_diff1, $arr_diff2);
// print_r($arr_diff);

// array_push() : 기존 배열에 값을 추가 하는 함수
// $arr_push = [1, 2, 3];
// array_push($arr_push, 4, 5); : 한번에 넣기
// $arr_push[] = 6; : 한개씩 넣기
// var_dump($arr_push);

// push로 한개씩 추가 키 값도 같이 넣기
$arr_push2 = [
	"a" => 1
	,"b" => 2
];
$arr_push2["c"] = 3;
print_r($arr_push2);


?>

