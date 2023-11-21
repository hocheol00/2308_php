// function func() {
//     console.log("2");
//     console.log("3");
// }
// console.log("1");
// func();
// console.log("4");

// function print() {
//     for (let i = 0; i <10; i++) {
//         console.log('home : ${i}');
//         console.log(i);
//     }
    
// }
// print();

// 호이스팅이란 : 아직 선언되지 않은 함수나 변수들을, 해당 스코프의 맨 위로 끌어올려 사용하는 작동 방식
 
/// 함수 선언식 (호이스팅 o)



// function print() {
//     console.log("night");
// }
// print();

// 함수 표현식 (호이스팅 x)

// let print = function () {
//     console.log("night");
// };

// print();

// 화살표형 함수
const print = () => {  
    console.log("night");
};

print();

// 콜백 함수

function start(name, callback) {
    console.log('안녕하세요', name, '입니다');
    callback();
}

function finish() {
    console.log("감사합니다.");
}

start('Hocheol', finish);