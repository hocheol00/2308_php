<?php

namespace lib;

class Validation {
	// static 사용시 self로 접근
	private static $arrErrorMsg = []; // 발리데이션용 에러 메세지 

	// getter : 에러메세지 반환용 메소드
	public static function getArrErrorMsg() {
		return self::$arrErrorMsg;
	}
	// setter : 에러메세지 저장용 메소드
	public static function setArrErrorMsg($msg) {
		self::$arrErrorMsg[] = $msg;
	}


	// 유효성 체크 메소드
	public static function userChk(array $inputData) : bool {
		// $patternID = "/^[a-zA-Z0-9]+$/"; // 정규식
		$patternId = "/^[a-zA-Z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,50}$/u"; // 한글 처리할때는 u 넣어야함 

		// 해당 키캆이 있을때만 체크
		// 아이디 체크
		if(array_key_exists("u_id", $inputData)) {
			if(preg_match($patternId, $inputData["u_id"], $match) === 0) {
				// id 에러처리
				$msg = "아이디는 영어 대소문자와 숫자로 8~20자로 입력해 주세요.";
				self::setArrErrorMsg($msg);
			}
		}
		
		// 비밀번호 체크
		if(array_key_exists("u_pw", $inputData)){
			if(preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
				// pw 에러처리
				$msg = "비밀번호는 영어 대소문자와 숫자로, !, @ 8~20자로 입력해 주세요.";
				self::setArrErrorMsg($msg);
			}
		}

		// 비밀번호 확인 췍
		if(array_key_exists("u_pw_chk", $inputData)) {
			if($inputData["u_pw"] !== $inputData["u_pw_chk"]) {
				// pw 확인 에러처리
				$msg = "비밀번호와 비밀번호 확인이 서로 다릅니다";
				self::setArrErrorMsg($msg);
			}
		}

		// 이름 체크
		if(array_key_exists("u_name", $inputData)) {
			if(preg_match($patternName, $inputData["u_name"], $match) === 0) {
				// name 에러처리
				$msg = "이름는 영어 대소문자와 한글로 2~50자로 입력해 주세요.";
				self::setArrErrorMsg($msg);
			}
		}


		// 리턴 처리
		if(count(self::$arrErrorMsg) > 0) {
			return false;
		}

		return true;
	}
}

