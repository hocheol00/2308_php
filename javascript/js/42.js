
// function my_setTimeout(callback, ms) {
// 	const NOW = new Date();
// 	let l1 = new Date();

// 	while(l1 - NOW <= 1000){
// 		l1 = new Date();
// 		}
// 	callback();
// }
// my_setTimeout()


//비동기 처리
console.log('A');
setTimeout(() => {
	console.log('B');
}, 1000);
console.log('C');

// a는 3초뒤 ,b는 2초뒤, c는 1초뒤 하는 비동기 처리 방식

setTimeout(() => {
	console.log('a');
}, 1000);
setTimeout(() => {
	console.log('b');
}, 1000);
setTimeout(() => {
	console.log('c');
}, 1000);

//콜백지옥 (비동기 처리를 동기처리로 바꾸는 방법을 콜백지옥이라고 한다)
setTimeout(() => {
	console.log('a');
	setTimeout( () => { 
		console.log('b');
		setTimeout(() => {
			console.log('c');
		},1000);
	}, 2000);
}, 3000);

