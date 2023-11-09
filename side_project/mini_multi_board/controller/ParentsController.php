<?php

namespace controller;

use model\BoardNameModel;

class ParentsController {
	// 전체에서 사용할수있는 맴버 변수
	protected $controllerChkUrl; // 헤더 표시 제어 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
	protected $arrBoardNameInfo; // 헤더 게시판 드롭다운 표시용
	//비로그인 시 접속 불가능한 url 리스트
	private $arrNeedAuth = [
		"board/list"
		,"board/add"
		,"board/detail"
	];

	public function __construct($action) {
		// view 관련 체크 접속 url 셋팅
		$this -> controllerChkUrl = $_GET["url"];
		// thid 정의 : 맴버변수를 쓰기위해 this를 사용한다

		//세션 시작
		if(!isset($_SESSION)) {
			session_start();
		}

		//유저 로그인 및 권한 체크
		$this->chkAuthorization();

		// 헤더 게시판 드롭박스 데이터 획득
		// 지역변수를 맴버변수로 변경하는 과정
		$boardNameModel = new BoardNameModel();
		$this->arrBoardNameInfo = $boardNameModel->getBoardNameList(); 
		//보드네임 모델 변수안에있는 보드네임 모델 클래스내에 있는 네임리스트 메소드를 호출해서
		// 그리턴값을 어레이보드네임이포에 값을 변경을 해준다
		$boardNameModel->destroy();

	

		// constroller 메소드 호출
		$resultAction = $this->$action();
		
		// view 호출
		$this->callView($resultAction);
		exit();
	}

	// 유저 권한 체크용 메소드
	private function chkAuthorization() {
		$url = $_GET["url"];
		// 접속권한이 없는 페이지 접속 차단
		if( !isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth) ) {
			header("Location: /user/login");
			exit();
		}

		// 로그인한 상태에서 로그인 페이지 접속시 board/list 로 이동처리
		if( isset($_SESSION["u_pk"]) && $url === "user/login" ) {
			header("Location: /board/list");
			exit();
		}
	}

	// 뷰 호출용메소드
	private function callView($path) {
		// view/list.php
		// location: /board/list

		if( strpos($path, "Location:") === 0 ) {
			header($path);
		} else {
			require_once($path);
		}	
	}
}

