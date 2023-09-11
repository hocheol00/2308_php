<?php
$num = 80;
// $str = "당신의 점수느 {$num}점 입니다.";

if ($num === 100){
	// echo $str,"A+";
	$grade = "A+";
}
else if($num >= 90){
	// echo $str,"A";
	$grade = "A";
}
else if($num >= 80){
	// echo $str,"B";
	$grade = "B";
}
else if($num >= 70){
	// echo $str,"C";
	$grade = "C";
}

else if($num >= 60){
	// echo $str,"C";
	$grade = "D";
}
else if($num < 60){
	// echo $str,"C";
	$grade = "F";
}

if ($num >= 0 && $num <= 100){
	echo "당신의 점수는 {$num}점 입니다. <$grade>";
}
else {
	echo "어려워서 못하겠다";
	}



// echo "당신의 점수는 {$num}점 입니다. <$grade>"
?>