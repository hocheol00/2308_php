<?php
// protected : 프로텍티드 내 상속관계에서 만 사용가능
// 외부 public 사용

namespace model; //이파일이 어디 안에있는지 적는거
class UserModel extends ParentsModel {
	public function getUserInfo($arrUserInfo, $pwFlg = false) {
		$sql =
			" SELECT "
			." * "
			." FROM user "
			." WHERE "
			." u_id = :u_id ";

		$prepare = [
			":u_id" => $arrUserInfo["u_id"]
		];
		
		// pw 추가처리
		if($pwFlg) {
			$sql .= "AND u_pw = :u_pw";
			$prepare[":u_pw"] = $arrUserInfo["u_pw"];
		}

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch(Exception $e) {
			echo"UserModel->getUserInfo Error : ".$e->getMessage();
			exit();
		}
	}
}

