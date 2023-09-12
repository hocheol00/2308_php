<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를만들어주세요.
// function my_parm(...$num) { //함수를 만들때 사용하는 문법으로
// 	$total = 0;  // 아래에서 변수를 사용하기 때문에 변수 초기화를 해준다
// 	foreach($num as $val) { //가변파라미터 변수인 넘값이 배열의 형태이기 때문에 폴이치를 사용하여 
// 		$total += $val;
// 	}
// 	return $total;
// }
// echo my_parm(1,2,3,4,5);


// 함수쓰는 이유는 유지보수 코드의 재사용성 때문에
//1부터 1만까지 더해지는 함수 구하기
	// function my_add($i) {
	// 	$total = 0;
	// 	for($i = 1; $i <= 10000; $i++ ) {
	// 		$total = $total + $i;
	// 	}
	// 	return $total;
	// }
	// 	echo my_add(10000);
	//숫자로 이루어진 문자열을 하나 받습니다
	//이 문자열의 모든 숫자를 더해주세요
	//예) "3421"일 경우, 3+4+2+1해서 10이 리턴 되는 함수

	function my_add($num) {
		$total = 0;
		$arr = str_split($num);
		foreach ($arr as $val) {
			$total += $val;
		}
		return $total;
	}

	echo my_add("3421");
	
$arr3 = '1231415';
print_r(str_split($arr3));

