<?php

namespace model;

use PDO; //db연결 pdo 클래스 사용
use Exception; // try catch 사용하기 위해 만듬

class ParentsModel {
	protected $conn;
	//생성자
	public function __construct() {	//construct는 항상 public으로 

		$db_dns		= "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
		
		try {
			$db_options = [
			PDO::ATTR_EMULATE_PREPARES		=> false // db의 prepared statment 기능을 사용하도록 설정
			,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION // pod exception을 throwㄴ 하도록
			,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC //연상배열로 fetch를 하도록 설정
			];
			
			//PDO Class 로 DB 연동
			$this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);
			return true;
		}
		catch (Exception $e) {
			echo "DB Connect Error : ".$e->getMessage();
			$conn = null; 
			exit();
			}
		}
		//DB 파기
		public function destroy() {
			$this->conn = null;
		}

		// beginTransction
		public function beginTransaction() {
			$this->conn->beginTransaction();
			
		}

		//commit
		public function commit() {
			$this->conn->commit();
		}
		
		//rollBack
		public function rollBack() {
			$this->conn->rollBack();
		}
	}
