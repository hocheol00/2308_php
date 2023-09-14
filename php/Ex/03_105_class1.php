<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것

class ClassRoom {
	// 맴버필드 
	
	// 접근제어 지시자 : public, private, protected
	public $computer; //public : 어디에서나 접근 가능
	public $now;
	private $book; // private : claas 내에서만 접근가능 class{}안에서 사용가능
	protected $bag; // protected : class와 나를 상속 받은 자식class내에서만 접근 가능

	//생성자(constructor) :
			//-클래스를 이용하여 객체를 생성할 떄 사용
			//-생성자를정의 하지 않을때는 디폴트 생성자가 선언
			// - 항상 public 으로 만들어야한다
	public function __construct() { 
		echo "컨스트럭트 실행";

		$this->now = date("Y-m-d H:i:s");
	}

	//메소드 : class내에 있는 함수
	public function class_room_set_value() {
		$this->computer = "컴퓨터";
		$this->book = "책";
		$this->bag = "가방";
		$this->desk = "책상";
	}
	// 	public function classRoomPrint() {
	// 		$str = $this->computer."\n"
	// 				.$this->book."\n"
	// 				.$this->bag;
	// 		echo $str;
		// public function get_now() {
		// 	return $this ->now;
		// }

		//getter 메소드
		public function get_now() {
			return $this->now;
		}
		// //setter 메소드
		public function set_now() {
			$this->now = "9999-01-01 00:00:00";
		}

	//static : instance를 사용하지 않아도 
	// public static function static_test() {
	// 	echo "스태틱 메소드";
	// }

}
//class instance 생성
$obj_ClassRoom = new ClassRoom();
// $obj_ClassRoom->class_room_set_value();
// $obj_ClassRoom->classRoomPrint();
echo $obj_ClassRoom->now;
// var_dump($obj_ClassRoom->book);

//static 객체 사용 방법
// ClassRoom::static_test();