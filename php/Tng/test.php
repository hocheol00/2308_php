<?php
//정해진 배열로 별 찍기

// $arr = ['a', 'b', 'c', 'd', 'e'];

// $cnt = count($arr);
// $i = $cnt -1;
// $flg = true;

// while(true) {
//     $idx = 0;
//     while($idx <= $i) {
//         echo $arr[$idx];
//         $idx++;
//     }
//     if(flg) {
//         $i++;
//     } else {
//         $i--;
//     }
//     if($i === $cnt -1) {
//         $flg = false;
//     }
//     if($i < 0) {
//         breack;
//     }
// }

//십구단
$myfile = fopen("testfile.txt", "a");

for($i = 1; $i <= 19; $i++) {
    echo "{$i}단\n";
    fputs($myfile, $i ."단" . "\n");
    for($num = 1; $num <= 19; $num++) {
        $total = $i * $num;
        echo "{$i} x {$num} = {$total}\n";
        fputs($myfile, $i. " X " . $num . " = " . $total ."\n");
        }
    }
fclose($myfile);

?>