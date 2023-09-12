<?php

$arr = [
	[
		"id" => "meerkat1"
		,"pw" => "php504"
	]
	,[
		"id" => "meerkat2"
		,"pw" => "php504"
	]
	,[
		"id" => "meerkat3"
		,"pw" => "php504"
	]	
];
echo "ID List\n";
foreach($arr as $key => $val){
	
	if($key!= 1) {
		echo $val["id"]."\n";
	}
}
