<?php
// $i = 0;
// while($i <= 2){
// 	echo "{$i}\n";

// 	$i++;
// }
//while : 조건이 참이면 루프하는 문법

// $i = 1;
// while($i <= 9){
// 	$mul = 2 * $i;
// 	echo "2 x {$i} = {$mul}\n";

// 	$i++;
// }

while(true) {
	$mul = 2 * $i;
	echo "2 x {$i} = {$mul}\n";
	if($i === 9) {
		break;
	}
	$i++;
}
// do~while : 무조건 한번은 실행하고, 그다음부터 조건이 참이면 루프하는 문법
$i = 0;
do {

}
while(true);