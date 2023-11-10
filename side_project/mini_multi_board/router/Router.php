<?php
namespace router;

// 사용할 컨트롤러들 지정
use controller\UserController;
use controller\BoardController;
// 라우터 : 유저의 요청을 분석해서 해당 controller로 연결해주는 클래스, __construct()는 항상 먼저 실행됨
class Router {
	public function __construct() {
		// URL 규칙
		// 1.회원 정보 관련 URL : 
		//			user/[해당기능]
		//			ex) 로그인 : 호스트/user/login
		//			ex) 회원가입 : 호스트/user/regist
		// 2.게시판 관련 URL : 
		//			board/[해당기능]
		//			ex) 리스트 : 호스트/board/list
		//			ex) 수정 : 호스트/board/edit

		$url = $_GET["url"]; //접속 URL 획득 겟메소드로 처리되는 애들을 담는거
		$method = $_SERVER["REQUEST_METHOD"]; //메소드 획득

		//로그인 페이지 get of post
		if($url === "user/login") {
			if($method === "GET") {
				new UserController("loginGet"); // __construct 실행 
				//해당 컨트롤러 호출
			} else {
				new UserController("loginPost"); //메소드 명으로 보내주는것
				//해당 컨트롤러 호출
			}
			//로그아웃 페이지 get (post 필요없음)
		} else if($url === "user/logout") {
			if($method === "GET") {
				//해당 컨트롤러 호출
				new UserController("logoutGet");
			}
			//회원가입 페이지 get of post
		} else if($url ==="user/regist") {
			if($method === "GET") {
				new UserController("registGet");
			} else {
				new UserController("registPost");
			}
		} else if($url ==="board/list") {
			if($method === "GET") {
				new BoardController("listGet");
			}
		} else if($url === "board/add") {
			if($method === "GET") {
				// 처리없음
			} else {
				new BoardController("addPost");
			}
		} else if($url === "board/detail") {
			if($method === "GET") {
				new BoardController("detailGet");
			}
		} else if($url === "user/idchk") {
			if($method === "GET") {
				new UserController("idchkGet");
			}
		} else if($url === "board/delete") {
			if($method === "GET") {
				new BoardController("deleteGet");
			}
		} 

		// router 조건 $url === "/user/idchk" else if문 작성
		// else if($url === "/user/idchk") {
		// if($method === "GET") {
		// new BoardController("idchkGet");
		echo "이상한 URL : ".$url;
		exit();
	}
}

