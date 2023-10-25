// random() : 0 이상 1미만의 랜덤한 수를 리턴
Math.ceil(Math.random() * 10); // 올림
Math.floor(3.5); // 버림
Math.round(3.5); // 반올림
//루프 100만번 돌리는 방법
console.log('루프시작');
for(let i = 0; i < 1000000; i++ ) {
	let ran = Math.ceil((Math.random() * 10));
	if( ran < 1 || ran >10) {
		console.log('이상한 숫자');
	}
}
console.log('루프끝');

// min(), max()
//결과값 부를때  Math.min(...arr) 일경우 배열에서 가장 작은수 출력
let arr =[1, 2, 3];
Math.min(arr);
Math.max(arr);