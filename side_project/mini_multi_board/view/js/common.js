
let test;
// 상세 모달 제어

function openDetail(id) {
	const URL = '/board/detail?id='+id;

	fetch(URL)
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





