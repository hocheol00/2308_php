// 인라인 이벤트
//html 파일 9~10 라인 확인



//프로퍼티 리스너 (현재는 많이 사용하지 않는 방법)
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
	location.href = 'http:\/\/www.google.com';
}

//addEventListener(eventType, function)
const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);

// open(1번째 주소 , 2번째 디폴트는'_blank'('공백으로 가능')새창을 기준으로 열고 '_self'열면 기존 브라우저 창으로 이동)

//팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');

// BTNCLOSE.addEventListener('click', () => winOpen.close()); // 파라미터를 함수로 만들지 않았을때
BTNCLOSE.addEventListener('click', popClose); // 파라미터를 함수로 만들고 받아왔을때


//---------------------
// 이벤트 삭제

// BTNDAUM.removeEventListener('click', popOpen);

function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
} // 파라미터로 쓸려고 콜백 함수를 만든것


function popClose() { 
	winOpen.close();
} // 파라미터로 쓸려고 콜백 함수를 만든것

BTNCLOSE.removeEventListener('click', popClose); // 



//----------------------------------------------

// 'test'를 콘솔에 출력하는 함수
function test() {
	console.log("test");
}

// 콜백함수를 실행하는 함수
function cb(fnc) {
	fnc(); // 파라미터를 실행하는 처리
}

const DIV1 = document.querySelector('#div1');
// DIV1.addEventListener('mouseenter', () => alert('DIV1에 들어왔어요'));
DIV1.addEventListener('mouseenter', () => { 
	alert('DIV1에 들어왔어요')
	DIV1.style.backgroundColor = '#000000';
});