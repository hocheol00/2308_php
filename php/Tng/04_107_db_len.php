<?php

//1. db_conn 이라는 함수를 만들어주세요
//      1-1 기능 : db설정 및 pdo객체 생성
require_once("./04_107_db_len2.php");

$conn = null;
my_db_conn($conn);

//2. 현재 급여가 80,000이상인 사원을 조회하기

// $sql =  " SELECT "
//         ." salary "
//         ." ,emp_no "
//         ." FROM "
//         ." salaries"
//         ." WHERE "
//         ." to_date >= now() "
//         ." and "
//         ." salary  >= :salary";
// $arr_ps = [
//     ":salary" => 80000    
// ];

// $stmt = $conn->prepare($sql); 
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// print_r($result);

//3. 조회한 데이터를 루프하면서 100,000이상이면 사원 번호 출력해주세요.

$conn = null;
my_db_conn($conn);

$sql =  " SELECT "
        ." salary "
        ." ,emp_no "
        ." FROM "
        ." salaries"
        ." WHERE "
        ." to_date >= now() "
        ." and "
        ." salary  >= :salary";
        
$arr_ps = [
    ":salary" => 80000    
];

$stmt = $conn->prepare($sql); 
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();

$i = 0;

foreach ($result as $key => $val) {
    if($val["salary"] >= 100000) {
        echo $val["emp_no"];
        echo "\n";
        $i++;
    }
}
echo $i;



 