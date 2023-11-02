<?php
// namaspace 해당 컨트롤러의 위치를 지정
namespace controller;

class UserController extends ParentsController{
	// 로그인
	protected function loginGet() {
		return "view/login.php";
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}

}