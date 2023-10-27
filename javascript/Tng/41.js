//1. 현재 시간을 화면에 표시
//2. 실시간으로 시간을 화면에 표시

const HTIME = document.getElementById('h-time')
//  setInterval(() => {
// 	const DATE = new Date();
// 	HTIME.innerHTML = DATE.toLocaleTimeString();
//  }, 1000);

STOP(); // 새로고침해도 시간을 표시하기위해 시간 나타내는 함수를 먼저 선언했음
let TIME = setInterval(STOP, 1000);

function STOP() {
	const DATE = new Date();
	HTIME.innerHTML = DATE.toLocaleTimeString();
	// BTN.addEventListener('click', STOP);
	
}

//3. 멈춰 버튼을 누르면, 시간이 정지할 것
const BTN = document.getElementById('btn')

function STOP2() {
	clearInterval(TIME);
}
BTN.addEventListener('click', STOP2);


//4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시

const BTN2 = document.getElementById('btn2')

function TIME2() {
	TIME = setInterval(STOP,1000);
}

BTN2.addEventListener('click', TIME2);


//********************
 //현재 시간 출력 하는 방법 2

//  let hour_24 = NOW.getHours();
//  let minute = NOW.getMinutes();
//  let second = NOW.getSeconds();
//  let AMPM = hour_24 > 12 ? '오후' : '오전';
//	let hour_12 = hour_24 > 12 ? hour_24 - 12 : hour_24;
//  let printTime =
// 	AMPM +' '
// 	+ add_str_zero(hour) + ':'
// 	+ add_str_zero(minute) + ':'
// 	+ add_str_zero(second);
// PRINSTTIME.innerHTML = prinsTime;

	
