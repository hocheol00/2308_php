<?php
// 1.titles 테이블에 데이터가 없는 사원을 검색
// 2.[1]번에 해당하는 사원의 직책 정보를 insert
//  2-1. 직책은 "green",시작일은 현재시간, 종료일은 99990101
// 3.디비에 저장 될 것

require_once("./04_107_db_len2.php");

$conn = null;
my_db_conn($conn);

$sql = "SELECT"
    ." emp.* "
    ." FROM "
    ." employees emp "
    ." left outer JOIN "
    ." titles t "
    ." ON "
    ." emp.emp_no = t.emp_no "
    ." WHERE "
    ." t.emp_no "
    ." IS NULL ";

$arr_ps = [
    
 ];

$stmt = $conn->prepare($sql); 
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();

foreach($result as $key => $val) 
{

    $sql = "INSERT INTO titles"
        ." VALUES "
        ." ( "
        ." :emp_no "
        ." ,:title "
        ." ,:from_date "
        ." ,:to_date "
        ." ) ";
    
    $arr_ps = [
        ":emp_no" => $val["emp_no"]
        ,":title" => "green"
        ,":from_date" => 20230919
        ,":to_date" => 99990101
    ];

}

$stmt = $conn->prepare($sql); 
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
$conn -> commit();
print_r($result);