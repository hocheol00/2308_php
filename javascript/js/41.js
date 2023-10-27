// 타이머 함수

// 1.setTimeout( 콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
// setTimeout(() => console.log('시간'), 3000);

// 콘솔에 1초 뒤에 'A', 2초뒤에 'B', 3초뒤에 'C' 출력되도록 프로그램 만드셈

// setTimeout(() => console.log('시간'), 3000);

//------ 함수로 만들어서 쓰는 방법
// function my_print(chr, ms) {
// 	setTimeout(() => console.log(chr), ms);
// }

// my_print('a', 1000);
// my_print('b', 2000);
// my_print('c', 3000);

// 2.clearTimeout(해당 setTimeout 객체) : 타이머를 삭제하는 기능

let mySet = setTimeout(() => console.log('시간'), 5000);
clearTimeout(mySet);


// 3.setInterval( 콜백함수, 시간(ms) ) : 일정 시간마다 반복
let myInter = setInterval(()=> console.log('민경씨 자지마'), 1000);
clearInterval(myInter);

// 화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨 출력

//************* html에 hi 태그 만들고 js만 만든경우

// const H1 = document.getElementById('h2');
// // H1.innerHTML = '두둥등장';

// function test(chr, ms) {
// 	setTimeout(() => H1.innerHTML = chr, ms);
// }

// test("두둥등장", 5000);
//-------------------------------


//*************** 바디 안에 바로 만든 경우 (이렇게 하면 안됨 ㅠ)
// const DIV = document.body;
// DIV.innerHTML = '빵빵이'

// function test2(chr, ms) {
// 	setTimeout(() => DIV.innerHTML = chr, ms);
// 	DIV.style.fontSize = '100px';
// }
// test2("빵빵이", 3000);



// *************************** 바디 안에 h1 태그 넣어서 만든경우(제일 베스트)
// ------ 순서1 (옥지얌 )
// const H1 = document.createElement('h1');
// H1.innerHTML = '옥지얌';
// document.body.appendChild(H1);

//---------순서2 (옥지얌)
// setTimeout(() => {
// 	const H1 = document.createElement('h1');
// 	H1.innerHTML = '옥지얌';
// 	document.body.appendChild(H1);
// }, 5000);

//위에 소스코드를 정리해서 함수로 만들면 
//순서 3
setTimeout(myADDH1, 5000);

function myADDH1() {
	const H1 = document.createElement('h1');
	H1.innerHTML = '옥지얌';
	document.body.appendChild(H1);
}