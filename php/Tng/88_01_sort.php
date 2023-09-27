<?php

//버블 정렬
// $arr = [34, 5, 3, 2, 6, 7, 3, 12];
// [5, 34, 3, 2, 6, 7, 3, 12]
// [5, 3, 2, 34, 6, 7, 3, 12]
// [5, 3, 2, 6, 34, 7, 3, 12]
// [5, 3, 2, 6, 7, 34, 3, 12]
// [5, 3, 2, 6, 7, 3, 34, 12]
// [5, 3, 2, 6, 7, 3, 12, 34]
// $i = $arr[1];
// $arr[1] = $arr[2];
// $arr[2] = $i;
// print_r($arr);
// $count = count($arr);
// for ($i = 0; $i <= $count-1; $i++) {
// 	for($z= 0; $z<=$count-2; $z++){
// 		if($arr[$z]>$arr[$z+1]){
// 			$tmp=$arr[$z];
// 			$arr[$z]=$arr[$z+1];
// 			$arr[$z+1]=$tmp;
// 		}
// 	}
// }
// print_r($arr);
$arr = [34, 5, 3, 2, 6, 7, 3, 12];

$count = count($arr);
for ($i = 0; $i <= $count-1; $i++) {
	for($s = 0; $s <= $count-2; $s++) {
		if($arr[$s] > $arr[$s+1]) {
			$tmp = $arr[$s];
			$arr[$s] = $arr[$s+1];
			$arr[$s+1] = $tmp;
		}
	}
}
print_r($arr);

foreach($arr as $key => $val) {
	$arr[$key];
}
