<?php
// 인덱스 배열
$arr = array(0, "a", 2, 6, 10); //인덱스 멀티 타입 배열
$arr2 = [0, 1, 2];

$arr3 = ["배열", $arr[1], $arr2[1]];

// var_dump ($arr3); 개발자가 개발 과정에서 사용, 전체적인 배열을 보여줌
// echo $arr3; 한개의 값 출력만 가능,실제로 유저한테 보여지는 값 출력 에코

// echo $arr[1];
// 연상배열
// $arr4 = [
// 	"name" => "홍길동"
// 	,"age" => 18
// 	,"gender" => "남자"
// ];
// echo $arr4["name"];

//다차원 배열
// $arr5 = [
// 	[11, 12, 13]
// 	,[21, 22, 23]
// 	,[31, 32, 33]
// ];
// var_dump ($arr5[2] [2]);

$arr6 = [
	"msg" => "ok"
	,"info" => [
		"name" => "홍길동"
		,"age" => 20
	]
];
var_dump($arr6["msg"]);
echo $arr6["info"]["age"];


?>