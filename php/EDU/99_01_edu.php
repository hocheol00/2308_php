<?php

// // php 데이터 타입
// $num = 1; // 인트 숫자
// $str = "as"; //문자열
// $arr = []; //배열
// $boo = true; // 참 또는 거짓
// //산술 연산자
// 1 + 1;
// 1 - 1;
// 1 * 1;
// 1 / 1;
// 1 % 1;

// //증감 /증가/ 연산자
// 1++; //후위 연산자 
// ++1; //전위 연산자
// 1--;

// //산술 대입 연산자
// $num = 1;
// $num += 2;

// // 비교 연산자
// 1 === "1"; // 결과 false
// 1 == "1"; // 결과 tree

// //논리 연산자
// && //  and : 둘다 참이여야 참이다
// || // or : 둘중에 하나만 참이여도 참
// ! // 결과를반전할때 not 연산자

// if(1 === 1) {
// 	echo "참참";
// }


// () : 조건
// [] : 배열 만들 떄
// {} : 내가 처리하고 싶은 연산들


// if($조건) {
// 	//처리할 내용
// }

// for ($시작값; $종료조건; $루프마다얼마증가) {
// 	//처리할 내용
// }

// while( $조건 ) {
// 	//처리할 내용
// }
// //문장 해석 향상 능력 중요 //글쓰기 연습 나의 장단점 쓰기


//배열(array)
// $arr = [1, 2, 3]; // 인덱스 배열 자동으로 0부터 번호가 주어진다
// $arr2 = [
// 	"key1" => "val1" // 연상배열 : 키를 직접 이름을 주어주고 값을 내는것
// 	,"key2" => [
// 			"key3" => "key3"
// 			,"key4" => "key4"
// 		]
// ];

// // echo $arr[2], "\n";
// // echo $arr2["key2"]["key4"];

// foreach( $arr2["key2"] as $key => $val) {
// 	echo "$key : $val,\n";
// }

$arr =  [
	[
		"emp_no" => 10001
		,"gender" => "F"
	]
	,[
		"emp_no" => 10002
		,"gender" => "M"
	]
	];
	
foreach ($arr as $key => $item) {
	if($item["gender"] == "M") {
		echo $item["emp_no"];
	}

}
