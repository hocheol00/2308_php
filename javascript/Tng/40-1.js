const BTN = document.getElementById('btn');
function BTN1() {
	alert('안녕하세요 \n div를 찾아주세요');
}
BTN.addEventListener('click', BTN1);

const DIV = document.getElementById('div');
function DIV1() {
	alert('근처에요');
}
DIV.addEventListener('mouseenter', DIV1); 



DIV.addEventListener('click', bingo);

function bingo() {
	BTN.removeEventListener('mouseenter', DIV1);
	alert('들킴');
	DIV.style.backgroundColor = 'beige';
	DIV.removeEventListener('click', bingo);
	DIV.addEventListener('click', bingo2);
} 

function bingo2() {
	alert('숨는다');
	DIV.style.backgroundColor = 'white';
	DIV.removeEventListener('click', bingo2);
	DIV.addEventListener('mouseenter', DIV1);
	DIV.addEventListener('click', bingo);
}

//토글이란 on/off 의 개념으로 스위치를 켰다,껐다 하는 기능
//add()와 remove()메서드를 한번에 쓸 수있는 합쳐진 개념이다
//box.classList 변수명의 클래스 속성의 리스트를 다가져온다
//토글은 클래스 값이 있으면 삭제 없으면 추가


//토글로 할경우
//변수명.classList.toggle('클래스명'); 

// const BOX = document.querySelector('#box');
// box.addEventListener('click', my_toggle);

// function my_toggle() {
// 	if( Box.claasname === "on"){
// 		Box.classList.toggle("on");
// 		alert("숨는다");
// 		warp.addEventListener("mouseenter", popup);
// 	} else {
// 		box.classList.toggle("on");
// 		alert("들켰다");
// 		wrap.removeEventListener('mouseenter', popup);
// 	}
// }