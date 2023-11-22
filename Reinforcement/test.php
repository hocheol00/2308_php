<?php
require_once('Picachu.php');
require_once('Turtle.php');

use Reinforcement\Picachu as pi; // 유즈 사용으로 미리 어디 피카츄를쓰는지 지정
use Reinforcement\Turtle as kk;
// new Reinforcement\Picachu; ues 안할때 항상 이렇게 해야함

// new Picachu(); // 클레스를 사용하기위해 클레스 앞에 네임 스페이스 쓰기

$obj = new pi(); // 셋팅이 된 피카츄 클래스 안에있는 컨스트럭트 넘겨주기 
$obj2 = new kk();

// echo $obj->howling;
// echo $obj->name;
echo $obj2->howling;


// pi::bbb(); // 클래스내에 스테틱 접근해서 사용할려면 (클래스명::함수) 방식으로 사용해야한다 
// $obj->geeterName();