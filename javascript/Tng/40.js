const BTN = document.getElementById('btn');
function BTN1() {
	alert('안녕하세요' +'\n'+ 'div를 찾아보세요');
}
BTN.addEventListener('click', BTN1);

const DIV1 = document.getElementById('div1');
function FDIV1() {
	alert('DIV1 근처에요 두근두근');
}
div1.addEventListener('mouseenter', FDIV1);


DIV1.addEventListener('click', bingo);

function bingo() {
	DIV1.removeEventListener('mouseenter', FDIV1);
	alert('들켰다 !');
	DIV1.style.backgroundColor = 'beige';
	DIV1.removeEventListener('click', bingo);
	DIV1.addEventListener('click', bingo2);
}

function bingo2() {
	alert("다시 숨는다");
	DIV1.style.backgroundColor = 'white';
	DIV1.removeEventListener('click', bingo2);
	div1.addEventListener('mouseenter', FDIV1);
	DIV1.addEventListener('click', bingo);
}
