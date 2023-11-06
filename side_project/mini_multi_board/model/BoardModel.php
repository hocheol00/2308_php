<?php

namespace model;

class BoardModel extends ParentsModel {
	public function getBoardList($arrBoardInfo) {
	$sql = 
		" SELECT " // 화면에 출력되는 거
		." id "
		." ,u_pk "
		." ,b_title "
		." ,b_content "
		." ,b_img "
		." ,created_at "
		." ,updated_at "
		." from board "
		." WHERE "
		." b_type = :b_type "
		." AND deleted_at IS NULL ";

		$prepare = [
			":b_type" => $arrBoardInfo["b_type"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch(Exception $e) {
			echo"BoardModel->getBoardInfo Error : ".$e->getMessage();
			exit();
		}
	}

	// 작성글 인서트
	public function addBoard($arrAddBoardInfo) {
		$sql =
		" INSERT INTO board( "
		."      u_pk "
		."      ,b_type "
		."      ,b_title "
		."      ,b_content "
		."      ,b_img "
		."      ) "
		." VALUES( "
		."      :u_pk "
		."      ,:b_type "
		."      ,:b_title "
		."      ,:b_content "
		."      ,:b_img "
		."      ) "
		;
		$prepare = [
			":u_pk" => $arrAddBoardInfo["u_pk"]
			,":b_type" => $arrAddBoardInfo["b_type"]
			,":b_title" => $arrAddBoardInfo["b_title"]
			,":b_content" => $arrAddBoardInfo["b_content"]
			,":b_img" => $arrAddBoardInfo["b_img"]
		];

		try {
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute($prepare);
			return $result;
		} catch(Exception $e) {
			echo"BoardModel->addBoard Error : ".$e->getMessage();
			exit();
		}
	}
}