<?php

// 클래스 위치 
namespace Reinforcement;

class Picachu { // 클래스명은 파일명과 동일하게
	// 접근 제어 지시자
	public $howling; // 외부 접근 가능
	private	$name; // 클래스 본인만 사용
	protected $type; // 상속된 클래스 사용 가능

	public function __construct() {
		$this->howling = "피 카퓨 피카츄";
		$this->name = "피 카퓨";
		$this->type = "전기";
	}

	public function ttt() {
		echo $this->name." 몸통박치기";
	}

	public function aaa() {
		echo $this->name."는".$this->type."타입 포켓몬 입니다";
	}
	// public static function bbb() {
	// 	echo "피카츄 !! 백만볼트";
	// }
	// public function geeterName() { // 프라이빗의 데이터를 외부에서 사용할려면 겟터메소드를 만들어서 접근시키고 외부에서 사용하기
	// 	return $this->name;
	// }

}