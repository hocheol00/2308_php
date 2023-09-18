<?php

$db_host = "localhost"; //host
$db_user = "root"; //user
$db_pw = "php504"; //password
$db_name = "employees"; //DB name
$db_charset = "utf8mb4"; //charset
$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

$db_options = [
    //DB의 prepared statement 기능을 사용하도록 설정
    PDO::ATTR_EMULATE_PREPARES => false
    //pod exception 을 throws 하도록설정
    ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    //연상배열로 fetch를 하도록 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

//pdo class로 db 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// //SQL 작성
// $sql = " SELECT " 
//           ." * "
//     ." FROM "
//           ." employees "
//     ." WHERE "
//         ." emp_no = :emp_no ";
// //prepared statement 셋팅
// $arr_ps = [
//     ":emp_no" => 10004
// ];
//prepared statement 생성
// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchAll(); //쿼리 결과를 fetch
// print_r($result);

// $sql = " SELECT " 
//           ." emp.birth_date "
//           ." ,sal.salary "
//           ." ,emp.emp_no "
//     ." FROM "
//           ." employees as emp"
//         ." JOIN " 
//            ." salaries as sal "
//            ." ON " 
//            ." emp.emp_no  =  sal.emp_no "
//         ." AND "
//             ."sal.to_date >= now()"    
//     ." WHERE " 
//            ." emp.emp_no = :emp_no "
//          ." OR "
//            ." emp.emp_no = :emp_no2 ";           

//prepared statement 셋팅
// $arr_ps = [
//     ":emp_no" => 10001
//     ,":emp_no2" => 10002
// ];

// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchAll(); //쿼리 결과를 fetch
// print_r($result); 

// //insert
//부서번호가 'd010', 부서명이 'php504'인거 데이터 insert
// $sql =
// " INSERT INTO departments ( "
// ." dept_no "
// ." ,dept_name "
// ." ) "
// ." VALUES ( "
// ." :dept_no "
// ." ,:dept_name "
// ." ) ";

$sql = 
" delete from departments "
." where "
." dept_no = :dept_no " ;


// $arr_ps = [
//     ":dept_no" => "d011"
//     ,":dept_name" => "php504"
// ];

// $arr_ps = [
//     ":dept_no" => "d011"
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // 실행하기위한
// $res_cnt = $stmt->rowCount();
// if($res_cnt >= 2) {
//     $obj_conn->rollback();
//     echo "rollback";
// }  else {
//          $obj_conn->commit();
//          echo "commit";
//      }
// if( !$result ) {
//     $obj_coon->rollback();
// } else {
//     $obj_conn->commit();
// // }
// $obj_conn->commit(); //커밋

// // var_dump($result);

// $obj_conn = null; //db파기

// FLUSH PRIVILEGES; : php에서 실행 후 해당 구문을 db에서 실행해줘야 새로고침후 db에 들어간다