// 기본 데이터 타입
//----------------
// 숫자(number)
let num = 1;

//문자열(string)
let str = "string";

//불리언(boolean)
let boo = true;

//null
let nu = null;

//undefined : 선언만 하고 할당은 하지 않은 데이터 타입
let und;

//symbol : 고유한 ID를 가진 데이터 타입
let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");



// 객체 타입
// Object
let obj = {
	food1: "탕수육"
	,food2: "짜장면"
	,food3: "육회비빔밥"
	,eat: function() {
		console.log("먹자");
	}
	,list: {
		list1: "리스트1"
		,list2: "리스트2"
	}
};

// Array
let arr = [1, 2, 3];
// Date
// Math
// 그 외에 기본 데이터 타입을 제외한 모든 것


//자기자신의 회원정보를 객체로 만들어 보세요

let info = {
	name1: "신호철"
	,bday: "0702"
	,gender: "M"
};