console.log("반갑습니다. js파일입니다");

// 변수
// 변수 선언 3가지 방법 (var, let, const)
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name); // console->log()

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

