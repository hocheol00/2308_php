<?

	// ***************************
	// 파일명 	: 04_107_fnc_db_connect.php
	// 기능 	: 디비 연동 함수
	// 버전 	: v001 new jung.mh 230918
	// 			: v002 dbconn 설정 변경 (수정자)
	// ***************************

	// ----------------------------
	// 함수명 	: my_db_conn
	// 기능 	: DB Connecy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------


	function my_db_conn( &$conn )
	{
		$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
		$db_user 	= "root"; // user
		$db_pw 		= "php504"; // password
		$db_name 	= "mini_test"; // DB name
		$db_charset = "utf8mb4"; // charset
		$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
	
		try
		{
			$db_options = [
			PDO::ATTR_EMULATE_PREPARES		=> false
			,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION
			,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
			];
		
			$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
			return true;
		}
		catch (Exception $e)
		{
			$conn = null;
			return false;
		}
	}

	
	// ----------------------------
	// 함수명 	: db_destroy_conn
	// 기능 	: DB Destoroy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	function my_db_destroy_conn(&$conn)
	{
		$conn = null;
	}

	
	// ----------------------------
	// 함수명 	: db_select_boards_paging
	// 기능 	: boards paging 조회
	// 파라미터 : PDO 	&$conn
	//			array	&$arr_param 쿼리 작성용 배열
	// 리턴 	: Array / false
	// ----------------------------

	function my_db_select_test_paging(&$conn, &$arr_param) 
	{
		try
		{
			$sql = 
				" SELECT "
				."		id "
				."		,title "
				."		,name_t "
                ."      ,creat_at "
                ."      ,views "
				." FROM "
				."		test "
				." WHERE "
				." delete_fig = '0' "
				." ORDER BY "
				." 		id DESC "
				." LIMIT :list_cnt OFFSET :offset "
				;
			$arr_ps = [
				":list_cnt" => $arr_param["list_cnt"]
				,":offset" => $arr_param["offset"]
			];
			
			// -> 객체 범위 내에서 객체에 접근
			// => 배열의 키, 값을 할당할 때 사용하는 오퍼레이터 

			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll(); // fetchall 배열을 결과로 한번에 전환
			return $result; // 정상 : 쿼리 결과 리턴
		}
		catch(Exception $e)
		{
			return false; // 예외 발생 : flase 리턴
		}
	}


	// ----------------------------
	// 함수명 	: db_select_boards_cnt
	// 기능 	: boards count 조회
	// 파라미터 : PDO 	&$conn
	// 리턴 	: int / false
	// ----------------------------

	function db_select_test_cnt(&$conn) {
			$sql =
				" SELECT "
				." count(id) as cnt "
				." FROM "
				." test "
				." WHERE "
				." delete_fig = '0' "
				;
		try{
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();

			return (int)$result[0]["cnt"];
		} catch(Exception $e) {
			return false;
		}
	}
	
	// ----------------------------
	// 함수명 	: db_insert_boards
	// 기능 	: boards 레코드 작성
	// 파라미터 : PDO 	&$conn
	//			Array	&$arr_param 쿼리 작성용 배열
	// 리턴 	: Boolean
	// ----------------------------
	function db_insert_crud(&$conn, &$arr_param) {
		$sql =
			" INSERT INTO test ( "
			." title "
			." ,content "
			." ) "
			." VALUES ( "
			." :title "
			." ,:content "
			." ) "
			;
		$arr_ps = [
			":title" => $arr_param["title"]
			,":content" => $arr_param["content"]
		];
		try {
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result; //결과 리턴
		}catch(Exception $e) {
			return false;
		}
	}


	// ----------------------------
	//특정 아이디의 게시글 정보를 가져오기
	// 함수명 	: db_select_boards_id
	// 기능 	: 
	// 파라미터 : PDO 	&$conn
	//			Array	&$arr_param 쿼리 작성용 배열
	// 리턴 	: boolean
	// ----------------------------



	function db_select_test_id(&$conn, &$arr_param) {
		$sql =
			" SELECT "
			." id "
			." ,title "
			." ,name_t "
			." ,creat_at "
			." FROM "
			." test "
			." WHERE "
			." id = :id "
			." AND "
			." delete_fig = '0' "
			;
			$arr_ps = [
				":id" => $arr_param["id"]
			];

			try {
			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result;
		} catch(Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}
	

	// ----------------------------
	// 함수명 	: db_update_boards_id
	// 기능 	:  boards 레코드 수정
	// 파라미터 : PDO 	&$conn
	//			Array	&$arr_param 쿼리 작성용 배열
	// 리턴 	: boolean
	// ----------------------------
	function db_update_test_id(&$conn, &$arr_param) {
	$sql =
		" UPDATE test "
		." SET "
		." title = :title "
		." ,name_t = :name_t "
		." WHERE "
		." id = :id ";
		
		$arr_ps = [
			":title" => $arr_param["title"]
			,":name_t" => $arr_param["name_t"]
			,":id" => $arr_param["id"]
		];

		try {
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result;
		} catch (Exception $e) {
			echo $e ->getMessage();
			return false;
		}
	}

	// ----------------------------
	// 함수명 	: db_delete_boards_id
	// 기능 	:  특정 id의 레코드 삭제
	// 파라미터 : PDO 	&$conn
	//			Array	&$arr_param
	// 리턴 	: boolean
	// ----------------------------

	function db_delete_test_id(&$conn, &$arr_param) {
		$sql =
			" UPDATE test "
			." SET "
			." delete_at = now() "
			." ,delete_fig = '1' "
			." WHERE "
			." id = :id "
			;
		$arr_ps = [
			":id" => $arr_param["id"]
		];
		
		try {
			//2. query 실행
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			
			return $result; //정상종료 : true 리턴
		} catch(Exception $e) {
			echo $e->getMessage(); //exception 메세지 출력
			return false; //예외발생 : false 리턴
		}

	}



?>