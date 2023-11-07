// 함수

// 함수 생성
// 함수 선언식 : 호이스팅에 영향을 받는다
// function fnc_sum(a, b) {
// 	return a + b;
// }

// // 함수 표현식 : 호이스팅에 영향을 받지 않는다
// let fnc1 = function(a, b) {
// 	return a + b;
// }

// // 익명함수 : 이름이 없는 함수
// let fnc2 = function(a, b) {
// 	return a + b;
// }
// // 콜백함수 : 다시 호출되는 함수,
// // 콜백함수의 기본적인 형태
// function fnc_callBack( call ) {
// 	call();
// 	// return call();
// }

// fnc_callBack(function() {
// 	console.log('익명함수');
// })

// //function 생성자 함수  이건 안씀 이런게 있다고 알려줏기만함
// let tt = Function('a', 'b', 'return a + b;');

// //화살표 함수(arrow funtion)
// //파라미터가 없는 경우
// let f1 = function() {
// 	return "f1";
// }

// let f2 = () => "f2"; // 위 함수 줄여서 쓰는 방식

// //파라미터가 1개인 경우
// let f3 = function(a) {
// 	return a + '입니다';
// }

// let f4 = a => a + '입니다'; //화살표 표기법

// //파라미터가 2개 이상인 경우
// let f5 = function(a, b) {
// 	return a + b;
// }
// let f6 = (a, b) => a + b; //화살표 표기법

// //함수의 처리가 많을 때 화살표 표기법
// let f8 = (a,b) => {
// 	if(a > b) {
// 		return 'a가 큼';
// 	} else {
// 		return 'b가 큼';
// 	}
// }
let num = 0;

function func(num) {
	if (num === 0) return "num의 값이 0입니다";
	if (num < 0) return "num의 값이 0보다 작습니다";
	if (num <= 10) return "num의 값이 10작거나 같다";
}



