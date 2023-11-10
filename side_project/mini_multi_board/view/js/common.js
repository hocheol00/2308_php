let test;
// 상세 모달 제어

function openDetail(id) {
  const URL = "/board/detail?id=" + id;

  fetch(URL) // 호출하면 브라우저는 네트워크 요청을 보내고 프라미스가 반환된다.
    .then((response) => response.json())
    .then((data) => {
      // 요소에 데이터 셋팅
      const TITLE = document.querySelector("#b_title");
      const CONTENT = document.querySelector("#b_content");
      const IMG = document.querySelector("#b_img");
      const CREATEDAT = document.querySelector("#created_at");
      const UPDATEDAT = document.querySelector("#updated_at");
      const DELETEID = document.querySelector("#deleteId");
      const BTNDELETE = document.querySelector("#btn-delete");

      UPDATEDAT.innerHTML = data.data.updated_at;
      CREATEDAT.innerHTML = data.data.created_at;
      TITLE.innerHTML = data.data.b_title;
      CONTENT.innerHTML = data.data.b_content;
      IMG.setAttribute("src", data.data.b_img); // 속성 넣어주는 코드
      DELETEID.value = data.data.id;

      if (data.flg === "1") {
        BTNDELETE.style.display = "block";
      } else {
        BTNDELETE.style.display = "none";
      }

      // 모달 오픈
      openModal();
    })
    .catch((error) => console.log(error));
}

// 모달 오픈 함수
function openModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.add("show");
  MODAL.style = "display: block; background-color: rgba(0, 0, 0, 0.7);";
}

// 모달 닫기 함수
function closeDetailModal() {
  const MODAL = document.querySelector("#modalDetail");
  MODAL.classList.remove("show");
  MODAL.style = "display: none";
}

// 작성일

// 아이디 중복 함수
function checkId() {
  const UID = document.querySelector("#u_id");
  const URL = "/user/idchk?u_id=" + UID.value; //?u_id get으로 넘겨줄려고 만든것
  const ID_CHK_MSG = document.getElementById("idChkMsg");
  ID_CHK_MSG.innerHTML = ""; // 기존에 있을지도 모르는 메세지를 비우는 처리

  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      // if(data.data.u_id === 1) return alert("이미 가입된 아이디 입니다.");
      // return alert("사용 가능한 아이디 입니다.");
      if (data.data.u_id >= "1") {
        ID_CHK_MSG.innerHTML = "이미 가입된 아이디 입니다.";
        ID_CHK_MSG.classList = "text-danger";
      } else {
        ID_CHK_MSG.innerHTML = "사용 가능한 아이디 입니다.";
        ID_CHK_MSG.classList = "text-success";
      }
    })
    .catch((error) => console.log(error));
}

// 아이디 체크 POST 다른 방식 - 라우터 부분
// router 조건 $url === "/user/idchk" else if문 작성
// else if($url === "/user/idchk") {
// if($method === "POST") {
// new BoardController("idchkPOST");

//<유저컨트롤러>
// protected function idchkPOST() {
//   $errorMsg = "";
//   $inputData = [
//     "u_id" => $_POST["u_id"]
//   ];
// 유효성 체크
// if(!Validation::userChk($inputData)) { // 유효성 체크
// $errorflg = "1";
// $errorMsg = Validation::getArrErrorMsg()[0];
// }
// 중복 체크
// $userModel = new UserModel();
// $result = $userModel->getUserInfo($inputData);
// $userModel->destroy();
// if(count($result) > 0) {
//  $errorFlg = "1";
//  $errorMsg = "중복된 아이디 입니다.";
// }
// response 처리
// $response = [
//  "errflg" =>$errorFlg
//  ,"msg" => $errorMsg
//  ];
// header('Content-type: application/json');
// echo json_encode($inputData);
// exit();

// js 함수
// function idChk() {
//   const INPUTID = document.getElementById('u_id');
//   const URL = '/user/idchk';
//   const ID_CHK_MSG = document.getElementById('idChkMsg');
//   ID_CHK_MSG.innerHTML = ""; // 기존에 있을지도 모르는 메세지 비우는 처리
//   const formData = new FormData(); // 새로운 폼 객체 생성
//   FormData.append("u_id", INPUT_ID.value); // 유저 입력아이디 폼에 세팅
//   const HEADER = { // header정보 세팅
//     method: "POST"
//     ,body:FormData
//   };
// 에러메시지 출력용으로 span태그로 regist.php input주변에 작성
//   fetch(URL, HEADER)
//     .then( response => response.json())
//     .then( data => {
//   if(data.errflg === "") {
//     ID_CHK_MSG.innerHTML = "사용 가능한 아이디입니다."
//     ID_CHK_MSG.classList = 'text-success';
//   } else {
//     ID_CHK_MSG.innerHTML = "사용할 수 없는 아이디입니다."
//     ID_CHK_MSG.classList = 'text-danger';
//   }
// })
//     .catch((error) => console.log(error));
// }

function deletealert() {
  if (confirm("삭제하시겠습니까?")) {
    alert("삭제 완료 하였습니다.");
    return true;
  } else {
    return false;
  }
}

/* 삭제처리 ajax 통신 방식 처리

리스트 페이지 (main 영역에)
<div class="card" id="card<?php echo $item["id"] ?>">

자바스크립트 삭제 처리
function deleteCard() {
	const B_PK = document.querySelect('#del_id).value;
	const URL = '/board/remove?id=' + B_PK;
	fetch(URL)
	.then( response => response.json() )
	.then ( data => {
		if(data.errflg === "0") {
			// 모달 닫기
			closeDetailModal();

			// 카드 삭제
			const MAIN = document.querySelector('main;)
			const CARD_NAME = '#card' + data.id
			const DEL_CARD = document.querySelector('CARD_NAME');
			MAIN.removeChild(DEL_CARD);
		} else {
			alert(data.msg);
		}
	})
	.catch( error => console.log(error) )
}

// 자바 삭제 버튼 표식 처리
	자바 상세 모달 요소 데이터셋팅 영역에 접근해야함
	const BTN_DEL = document.querySelector('#btn_del);  

	if(data.data.flg === "1") {
		BTN_DEL.classList.remove('d-none');
	} else {
		BTN_DEL.classList.add('d-none');
			}




// 라우터 부분
else if($url === "board/remove") {
		if($method === "GET") {
			new BoardController("removeGet");
		}

// 보드 컨트롤러부분 

// 삭제 처리 api
protected function removeGet() {
	$errFlg = "0";
	$errMsg = "";
	$arrDeletBoardInfo = [
		"id" => $_GET["id"]
		,"u_pk" => $_SESSION["u_pk"]
	];

	// 삭제 처리 부분
	$boardModel = new BoardModel();
	$boardModel->beginTransaction()
	$result = $boardModel->removeBoardCard($arrDeletBoardInfo);
	if($result !== 1) {
		$errFlg = "1";
		$errMsg = "삭제 처리 이상";
		$boardModel->rollBack();
	} else {
		$boardModel->commit;
	}
	$boardModel->destroy();

	//레스폰스 데이터 작성
	$arrTmp = [
		"errflg" => $errFlg
		,"msg" => "$errMsg"
		,"id" => $arrDeletBoardInfo["id"]
	];
	$response = json_encode($arrTmp);

	//response 처리
	header('Content-type : application/json')
	echo $response;
	exit();
}

 // 보드 모델 부분

	public function removeBoardCard($arrDeleteBoardInfo) {
		$sql =
			" UPDATE board "
			." SET "
			." deleted_At = NOW() "
			." WHERE "
			." id = :id "
			." AND u_pk = :u_pk "
			;

			$prepare = [
				":id" => $arrDeleteBoardInfo["id"]
				,":u_pk" => $arrDeleteBoardInfo["u_pk"]
			];
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->rowCount(); // 쿼리에 영향을 받은 레코드 수를 반환
			return $result;
		} catch(Exception $e) {
			echo"BoardModel->removeBoardCard Error : ".$e->getMessage();
			exit();
		}
	}


*/
