<?php
//PDO클래스를 이용해서 아래 쿼리를 실행해 주세요

// 1.자신의 사원 정보를 employees테이블에 등록해 주세요
// 2.자신의 이름을 "둘리",성을 "호이"로 변경해주세요.
// 3.자신의 정보를 출력해 주세요.
// 4.자신의 정보를 삭제해 주세요.
// 5.PDO클래스 사용법 숙지

require_once("../ex/04_107_fnc_db_connect.php");
my_db_conn($conn);
//insert
$sql =
// " INSERT INTO employees ( "
//     ." emp_no "
// 	." ,birth_date "
// 	." ,first_name "
// 	." ,last_name "
// 	." ,gender "
// 	." ,hire_date "
//     ." ) "
//     ." VALUES ( "
//     ." :emp_no "
//     ." ,:birth_date "
//     ." ,:first_name "
//     ." ,:last_name "
//     ." ,:gender "
//     . " ,:hire_date "
//     ." )" ;

// $arr_ps = [
//     ":emp_no" => 500003
//     ,":birth_date" => 19970702
//     ,":first_name" => "hocheol"
//     ,":last_name" => "Shin"
//     ,":gender" => "M"
//     ,":hire_date" => 20230918
// ];

//update
" UPDATE employees "
." SET first_name = :first_name "
." ,last_name =  :last_name "
." WHERE emp_no  = 500003 ";

$arr_ps = [
    ":first_name" => "Dooly"
    ,":last_name" => "hoi"
];

    
$stmt = $conn->prepare($sql); 
$result = $stmt->execute($arr_ps);
$conn -> commit();
// var_dump($result);