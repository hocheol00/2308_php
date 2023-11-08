
let test;
// 상세 모달 제어

function openDetail(id) {
	const URL = '/board/detail?id='+id;

	fetch(URL) // 호출하면 브라우저는 네트워크 요청을 보내고 프라미스가 반환된다.
	.then( response => response.json() )
	.then( data => {
		// 요소에 데이터 셋팅
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const CREATEDAT = document.querySelector('#created_at');
		const UPDATEDAT = document.querySelector('#updated_at');

		UPDATEDAT.innerHTML = data.data.updated_at;
		CREATEDAT.innerHTML = data.data.created_at;
		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		IMG.setAttribute('src', data.data.b_img); // 속성 넣어주는 코드

		// 모달 오픈
		openModal();
	} )
	.catch( error => console.log(error) )
}
// 모달 오픈 함수
function openModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}


// 모달 닫기 함수
function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none';
}

// 작성일 



// 아이디 중복 함수
function checkId() {
	const UID = document.querySelector('#u_id');
	const URL = '/user/idchk?u_id='+UID.value; //?u_id get으로 넘겨줄려고 만든것
	const ID_CHK_MSG = document.getElementById('idChkMsg');
	ID_CHK_MSG.innerHTML = ""; // 기존에 있을지도 모르는 메세지를 비우는 처리

	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		// if(data.data.u_id === 1) return alert("이미 가입된 아이디 입니다."); 
		// return alert("사용 가능한 아이디 입니다."); 
		if(data.data.u_id >= "1") {
			ID_CHK_MSG.innerHTML = "이미 가입된 아이디 입니다."
			ID_CHK_MSG.classList = "text-danger";
		} else {
			ID_CHK_MSG.innerHTML = "사용 가능한 아이디 입니다."
			ID_CHK_MSG.classList = "text-success";
			}
	} )
	.catch( error => console.log(error) )
}



// 아이디 체크 모달 제어 POST방식
// function idChk() {
//   const INPUTID = document.getElementById('u_id');
//   const URL = '/user/idchk';
//   const formData = new FormData(); // 새로운 폼 객체 생성
//   FormData.append("u_id", INPUT_ID.value); // 유저 입력아이디 폼에 세팅
//   const HEADER = { // header정보 세팅
//     method: "POST"
//     ,body:FormData
//   };
//   fetch(URL, HEADER)
//     .then( response => response.json())
//     .then( data => {
// 		if(data.errflg === "0") {
// 			ID_CHK_MSG.innerHTML = "사용 가능한 아이디 입니다."
// 			ID_CHK_MSG.innerHTML = "text-success.";
// 		} else {
// 			ID_CHK_MSG.innerHTML = "이미 가입된 아이디 입니다.."
// 			ID_CHK_MSG.innerHTML = "text-danger.";
// 		}
// 	})
//     .catch((error) => console.log(error));
// }



