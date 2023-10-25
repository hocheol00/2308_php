// 원본은 보존하면서 오름차순 정렬 해주세요
const ARR1 = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

let arr2 = Array.from(ARR1);
arr2 = arr2.sort((a, b) => a - b); 

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요 (다하면 함수도)
const ARR4 = [5,7,3,4,5,1,2];

let boo_filter = ARR4.filter( num => num % 2 ===0); // 짝수
let boo2_filter = ARR4.filter( num => num % 2 === 1); // 홀수
//함수로 만들기
function test( arr, flg) {
	if( flg === 0 ) {
		return arr.filter( num => num % 2 === 0);
	} else {
		return arr.filter( num => num % 2 === 1);
	}
}

// 다음 문제열에서 구분문자를 '.'에서 ''(공백)으로 변경해 주세요.
const STR1 = 'php504.meer.kat';

let STR2 = STR1.split('.');
console.log(STR2);

let STR3 = STR2.join(' ');
console.log(STR3);