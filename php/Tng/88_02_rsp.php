<?php

// // $in_str = fgets(STDIN);

// while(true) {

// $game = rand(1,3);
// echo "가위는 's', 바위는 'r', 보는 'p' 실행종료는 'e' 입니다";
// $input = "";
// $input = trim(fgets(STDIN));


// if($input == "s") {
// 		if ($game == 1) {
// 			echo "무승부\n";
// 		}
// 		else if ($game == 2) {
// 			echo "패배\n";
// 		}
// 		else if ($game == 3) {
// 			echo "승리\n";
// 		}
// 	}

// else if($input == "r") {
// 	if ($game == 1) {
// 		echo "승리\n";
// 	}
// 	else if ($game == 2) {
// 		echo "무승부\n";
// 	}
// 	else if ($game == 3) {
// 		echo "패배\n";
// 	}
// }

// else if ($input == "p") {
// 	if ($game == 1) {
// 		echo "패배\n";
// 	}
// 	else if ($game == 2) {
// 		echo "승리\n";
// 	}
// 	else if ($game == 3) {
// 		echo "무승부\n";
// 	}
// }

// else if ($input =="e") {
// 	break;
// }

// }

//숫자 맞추기 게임

// $num = rand(1,100);
// $user = fgets(STDIN);
// $i = 0;

// while(true) {
// 	$i ++;
// 	echo "\n입렵값 : ";
// 	$user = fgets(STDIN);
// 	$z = 5 - $i;
// 	if($num < $user) {
// 		echo "사용자의 값이 더 커요\n남은횟수 : {$z}\n";
// 	}
// 	else if($num > $user) {
// 		echo "사용자의 값이 더 작음\n남은횟수 : {$z}\n";
// 	}
// 	else if($num == $user) {
// 		echo "정답입나당!\n";
// 		break;
// 	}

// 	if($i === 5) {
// 		echo "실패 : 다시 도전하세요\n정답 : {$num}";
// 		break;
// 	}
	 
// }

// 1.반복문을 이용하여 숫자를 1~10까지 출력해주세요.

// for($i = 1; $i <= 10; $i++ ) {
// 	echo $i,"\n";
// }

// // 2.구구단 8단을 출력해 주세요.

// for($i = 1; $i <= 9; $i++) {
// 	$total = $i * "8\n";
// 	echo "8 x {$i} = {$total}\n";
// }

//3.19단을 출력해 주세요

// for($i = 1; $i <= 19; $i++) {
// 	$total = $i * 19;
// 	echo "19 x {$i} = {$total}\n";
// }

//19단 while 문
// $i = 1;
// while($i <= 19) {
// 	$total = $i * 19;
// 	echo "19 x {$i} = {$total}\n";
// 	$i++;
// }




//4.두 숫자를 더해주는 함수를 만들어 주세요

// function add_a($a, $b) {
// 	$c = $a + $b;
// 	return $c;
// }

// add_a(1,2);

//5. 짜장면이면 중식, 비빔밥이면 한식, 그외는 양식으로 출력해 주세요

// $item = "고구마";
// if($item === "짜장면") {
// 	echo "중식";
// }
// else if ($item === "비빔밥") {
// 	echo "한식";
// }
// else {
// 	echo "양식";
// }

// switch ($item) {
// 	case "짜장면":
// 		echo "중식";
// 		break;
// 	case "비빔밥":
// 		echo "한식";
// 		break;
// 	default:
// 		echo "양식";
// }
123