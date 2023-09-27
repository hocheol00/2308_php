<?php
// for($num = 1; $num <=10; $num++) {
// 	echo $num, "\n";
// }



// for($num = 1; $num <= 9; $num++) {	
// 	$mul = 2 * $num;
// 	echo "2 x {$num} = ", $mul, "\n";
// }


// for($i = 1; $i <= 5; $i++) {
// 	for($s = 1; $s <= $i; $s++) {
// 		echo "*";
// 	}
// 	echo "\n";
	
// }

$num = 5;
for($i = 1; $i <= $num; $i++) {
	for($j = 1; $j <= $num-$i; $j++){
		echo " ";
		}
	for($s = 1; $s <= $i; $s++) {
		echo "*";
		}
	
	echo "\n";
}

// $sum = 5;
// for($s = 1; $s <= $sum; $s++){
// 	for($s2 = $sum-$s; $s2>=1; $s2--){
// 		echo " ";
// 	}
// 	for($s3 = 1; $s3 <= 2* $s -1; $s3++){
// 		echo "*";
// 	}
// 	echo "\n";
// }



?>