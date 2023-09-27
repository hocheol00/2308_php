<?php


//if 문제 : 90이면 수, 80이면 우 , 그외는 노력

// $i = 79;
// if( $i === 90) {
// 	echo "수";
// } else if( $i === 80 ) {
// 	echo "우";
// } else {
// 	echo "노력";
// }

// while문 이용해서 : 구구단 7단
// $num = 1;
// while($num <= 9) {
// 	$total = 7 * $num;
// 	echo "7 x {$num} = {$total}\n";
// 	$num++;
	
// }

//while 문 이용해서 * 찍기
$i = 1;
while($i<=5) {
	$x = 1;
	$z = 1;
	while($x <= 5 - $i) {
		echo " ";
		$x++;
	}
	while($z <= $i) {
		echo "*";
		$z++;
	}
	echo "\n";
	$i++;
	}
