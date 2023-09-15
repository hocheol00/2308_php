<?php

// $in_str = fgets(STDIN);

while(true) {

$game = rand(1,3);
echo "가위는 's', 바위는 'r', 보는 'p' 실행종료는 'e' 입니다";
$input = "";
$input = trim(fgets(STDIN));


if($input == "s") {
		if ($game == 1) {
			echo "무승부\n";
		}
		else if ($game == 2) {
			echo "패배\n";
		}
		else if ($game == 3) {
			echo "승리\n";
		}
	}

else if($input == "r") {
	if ($game == 1) {
		echo "승리\n";
	}
	else if ($game == 2) {
		echo "무승부\n";
	}
	else if ($game == 3) {
		echo "패배\n";
	}
}

else if ($input == "p") {
	if ($game == 1) {
		echo "패배\n";
	}
	else if ($game == 2) {
		echo "승리\n";
	}
	else if ($game == 3) {
		echo "무승부\n";
	}
}

else if ($input =="e") {
	break;
}

}

