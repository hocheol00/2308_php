<?php
// 1.산술연산자
// echo "더하기 : 1 + 1 =", 1 + 1, "\n";
// echo "빼기 : 1 - 1 =", 1 - 1, "\n";
// echo "곱하기 : 2 * 3 =", 2 * 3, "\n";
// echo "나누기 : 2 / 3 =", 2 / 3, "\n";
// echo "나머지 : 2 % 3 = ",2 % 3, "\n"
// echo (10 - 5) * 8 / 10;

// 2. 증강/감소(증감) 연산자
// $num1 = 8;
// $num1++;
// echo $num1, "\n";
// $num1 --;
// echo $num1++;
// echo $num1;
// echo ++$num1;
// echo $num1;

//3. 산술 대입 연산자
// $num = 5;
// $num = $num + 2;
// $num += 2;
// $num -= 2;
// $num *= 2;
// $num /= 2;
// $num = 5;
// $num %= 6;

// echo $num;

// $tng_num = 10;

// echo $tng_num += 10;
// echo $tng_num /= 5;
// echo $tng_num -= 4;
// echo $tng_num %= 7;
// echo $tng_num *= 3;

// 4. 비교 연산자
$num = 1;
$str = '1';
// var_dump( 2 > 1 );
// var_dump( 2 < 1 );
// var_dump( 2 >= 1 );

// var_dump($num == $str); //값의 형태만 비교
// var_dump($num === $str); //값의 데이터 타입까지 비교(완전비교)
// var_dump($num != $str); //값의 형태만 비교
// var_dump($num !== $str); //값의 데이터 타입까지 비교(불완전비교)

// 5. 논리 연산자
// //and 연산자
// var_dump( 1=== 1 && 2 === 2);
// var_dump( 1=== 1 && 2 === 1);

// or 연산자
// var_dump( 1=== 1 || 2 === 2);
// var_dump( 1=== 1 || 2 === 1);
// var_dump( 1=== 2 || 2 === 1);

// not 연산자 - 연산의 결과를 뒤집는것 
var_dump( !(1 === 1));
var_dump(!(2 === 3));
?>