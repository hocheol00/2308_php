// 두 수를 받아서 더한 값을 리턴해주는 함수

// function mySum(a,b) {
// 	return a +b;
// }
// mySum(2,5);


// // 콜백함수 : 함수를 나중에 실행 시키기 위해 사용한다
// //파라미터로 함수를 다 보내준것은 콜백함수이다.
// function myCallBack(fnc) {
// 	fnc();
// }

// myCallBack( function() {
// 	console.log('123');
// });


// myCallBack( () => console.log('123') );

// function myPrint() {
// 	console.log('123');
// }

// setTimeout(myPrint, 1000); // myPrint 함수에 () 붙이지 않는 이유는 바로 실행하지 않게 할려고 그래서 콜백 함수로 사용

//함수를 3개 만들어 주세요
// php를 출력하는 함수
// 504를 출력하는 함수
// 풀스택을 출력하는 함수

// 1번 함수는 3초 뒤에 출력
// 2번 함수는 5초뒤에 출력
// 3번 함수는 바로 출력


// function php() {
// 	console.log('php');
// }

// setTimeout(php, 3000);

// function php1() {
// 	console.log('504');
// }

// setTimeout(php1, 5000);

// function php2() {
// 	console.log('풀스택');
// }

// // setTimeout(php2, 0);  바로 출력 할려면 함수 바로 출력 하는것이 좋음
// php2();






// if retrun 사용

// function func(num) {
// if (num === 0) return "값이 0입니다";
// if (num < 0) return "0보다 작다";
// if (num >= 10) return "10보다 크거나 같다";
// return "0보다 크거나 10보다 작다";
// }

// console.log (func(-1));


//현재시간 

// let now = new Date();

// let year = now.getFullYear();
// let month = now.getMonth() + 1;
// let day = now.getDate();
// let hour = now.getHours();
// let minute = now.getMinutes();
// let second = now.getSeconds();

// const TODAY = year + '-' + month + '-' + day + '-' + '' + hour + '-' + minute + '-' + second;

const MOVE = document.getElementById('move');

// MOVE.addEventListener('click', function() {
// 	location.href = 'http:\/\/naver.com';
// });

MOVE.addEventListener('click', naver);

// function naver() {
// 	location.href = 'http:\/\/naver.com';
// }


// confirm 으로 새팝업창 페이지 이동
function naver()
{
    let str = " 다른 페이지로 이동해 볼까요???";
    let type;
    type = confirm(str);
     if(type== true)
    {
         window.open('http:\/\/naver.com');
    }
}