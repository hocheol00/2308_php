//Date(디폴트는 현재값)
let now = new Date();

let sDate = new Date('2023-09-30 19:20:10');// 내가 지정한 날짜로 date 가져오기

//getFullYear() : 연도만 가져오는 메소드
let year = now.getFullYear(); // 두번째 방법 년 월 일 선언 한것
console.log(now.getFullYear());

//getMonth() : 월만 가져오는 메소드 (1+을 해줘야지 현재월과 같게 나온다)
let month = now.getMonth();// 두번째 방법 년 월 일 선언 한것
console.log(now.getMonth() + 1);

//getDate() : 일(날짜)을 가져오는 메소드 
let date = now.getDate();// 두번째 방법 년 월 일 선언 한것
console.log(now.getDate());

//getday() : 요일을 가져오는 메소드 (0(일요일) ~ 6(토요일))
// console.log(now.getDay());
// let kDay = '';
// switch (day) {
// 	case 1:
// 		kDay = '월요일';
// 		break;
// 	case 2:
// 		kDay = '화요일';
// 		break;
// 	case 3:
// 		kDay = '수요일';
// 		break;
// 	case 4:
// 		kDay = '목요일';
// 		break;
// 	case 5:
// 		kDay = '금요일';
// 		break;
// 	case 6:
// 		kDay = '토요일';
// 		break;
// 	default:
// 		kDay = '일요일';
// 		break;
// }
// console.log(now.getDay() + ' : ' + kDay);
// //현재 년 월 일 가져오기
console.log(now.getFullYear() + '-' + (now.getMonth() + 1) + '-' +now.getDate());

//getHours() : 시를 가져오는 메소드
console.log(now.getHours());
//getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());
//getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());
//getMilliseconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

//getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초
 console.log(now.getTime());

 //기준일 : 2023-09-30 19:20:10
 //오늘로부터 몇일 전인지 구해봅시다
 now = new Date(); //오늘 dage
 sDate = new Date('2023-09-30 00:00:00');

let test = now.getTime() - sDate.getTime();
test1 = test / (1000*60*60*24);
test1 = Math.floor(test1);

// // 오늘로 부터 몇일 전인지 구하는 방법 2번째
//year,month,date 를 위에서 선언해 줘야한다
let now2 = new Date(year, month, date, 0, 0, 0, 0); //오늘날짜 0시0분0초0밀리초 가져오는 방법

let diff = Math.abs(Math.floor(( now2 - sDate) / 86400000));


