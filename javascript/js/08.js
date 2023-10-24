// 조건문
// if(조건) {

// } else if(조건) {

// } else {

// }


let age = 20;

switch(age) {
	case 20:
		console.log("20대")//처리
		break;		
	case 30:
		console.log("30대")//처리
		break;
	default:
		console.log("모르겠다.")
		break;
}

//---------------------
// 반복문 (while, do_while, for, foreach, for..in, for...of)
//---------------------

//foreach : 배열만 사용가능
// let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key ){
// 	console.log(`${key} : ${val}`);
// });

// for...in : 모든 객체를 루프 가능, key에만 접근이 가능
let obj = {
	key1: 'val1'
	,key2: 'val2'
}
for( let key in obj ) {
	console.log(key); // : 키 값 가져올때
	// console.log(obj[key]); for..in 으로 val 값 가져올때
}

//for...of : 모든 iterable객체를 루프 가능, value에 접근 가능 (String, Array, Set, TypeArray)
// for( let val of obj ) {
// 	console.log(val);
// }


//정렬해주세요
let sort_arr = [3, 5, 2, 7, 10]

let sort_sarr = sort_arr.sort((a,b) => a - b); //콜백 함수 사용 , 화살표 기법 사용
console.log(sort_sarr);

// for( let i = 0; i < sort_arr.length; 1 ++) {
// 	for(let z = 0; z < sort_arr.length - i - 1; z++) {
// 		if(sort_arr[z] > sort_arr[z+1]) {
// 			let tamp = sort_arr[z];
// 			sort_arr[z] = sort_arr[z+1];
// 			sort_arr[z+1] = tamp;
// 		}
// 	}
// }
// console.log(sort_arr);