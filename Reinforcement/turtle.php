<?php
namespace Reinforcement;

class Turtle{
	
	public $howling; // 외부 접근 가능
	private	$name; // 클래스 본인만 사용
	protected $type; // 상속된 클래스 사용 가능

	public function __construct() {
		$this->howling = "꼬부기꼬부기";
		$this->name = "꼬부기";
		$this->type = "물물";
	}

	public function ttt() {
		echo $this->name." 물물물통박치기";
	}

	public function aaa() {
		echo $this->name."는".$this->type."타입 포켓몬 입니다";
	}
	
	public function ccc() {
		echo $this->name." 물대포";
	}
}