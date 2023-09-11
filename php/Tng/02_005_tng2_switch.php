<?php
$rank = 6;
$award = "";

// switch 소스코드
// switch ($str) {
// 	case "1":
// 		$award = "금상";
// 		break;
// 	case "2":
// 		$award = "은상";
// 		break;
// 	case "3":
// 		$award = "동상";
// 		break;
// 	case "4":
// 		$award = "장려상";
// 		break;		
// 	default:
// 		$award = "노력상";
// 		break;
// }
// echo $award;

//IF  소스코드
if ($rank === 1){
	$award = "금상";
}
else if($rank === 2){
	$award = "은상";
}
else if($rank === 3){
	$award = "동상";
}
else if($rank === 4){
	$award = "장려상";
}
else {
	$award = "노력상";
}


echo $award;

?>