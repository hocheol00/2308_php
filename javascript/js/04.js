console.log("반갑습니다. js파일입니다");

// 변수
// 변수 선언 3가지 방법 (var, let, const)
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name); //

// u_name = "갑순이"; // 재할당 var 를 빼도 가능
// console.log(u_name);

//let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let u_name = "홍길동";
console.log(u_name);

u_name = "갑순이"; // let 재할당 
console.log(u_name);

//const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const AGE = 19;
console.log(AGE);

let num1 = "15";
let num2 = 5;
console.log(parseInt(num1) + num2); // parsint : 문자열을 숫자로 형변환


//스코프
//1. 전역(global) 스코프
	let gender = "M";
//2. 함수레벨(local)(지역) 스코프
	function test() {
		let test1 = "test1";
		console.log(test1); //if 문 밖의 test1 값 출력
	}
//3. 블록레벨 스코프  // 중괄호가 있으면 블록레벨
function test() {
	let test1 = "test1";
	if(true) {
		let test1 = "test2";
		console.log(test1); //if 문 안의 test1 값 출력
		}
		console.log(test1); //if 문 밖의 test1 값 출력
	}

// 호이스팅
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는것
//(인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

// console.log(htest1());
// console.log(hlet); // 호이스팅 때문에 순서를 콘솔로 먼저 호출하면 에러가 뜬다

function htest1() {
	return "htest1 함수 입니다.";
}

var hvar = "var로 선언";
let hlet = "let으로 선언";

console.log(hlet);