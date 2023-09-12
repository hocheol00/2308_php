<?php
// $arr = [1, 2, 3];
//foreach : 배열의 길이만큼 루프하는 문법,배열을 루프하고싶을때 사용

$arr2 = [
	"현희" => "불고기"
	,"호철" => "김치"
	,"휘야" => "못정함"
];

foreach ($arr2 as $key => $val){
	echo "{$key} : {$val}\n";
}
// 키가 필요 없을때
foreach ($arr2 as $key => $val){
	echo "{$val}\n";
}
