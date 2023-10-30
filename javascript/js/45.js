// 1. promise 객체
	// 비 동기 츠로그래밍의 근간이 되는 기법 중 하나
	// 프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어가능
	// promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체

	// 2.promise 사용법
	// new 에 다는 이유는 객체이기 때문에
	const PROMISE9 = new Promise( function(resolve, reject) {
		let flg = true;
		if(flg) {
			return resolve('성공'); // 요청 성공시 
		} else {
			return reject('실패'); // 요청 실패시
		}
	});

	// promise 사용 법
	PROMISE9
	.then( date => console.log(date)) // return 이 resolve 일때 (성공했을때)
	.catch( err => console.log(err)) // reject일때 실패했을때 처리 
	.finally(() => console.log('finally 입니다')); // 무조건 실행 (어떤 소스코드든 다실행)

	//3. promise 함수등록
	// 재사용성, 가독성, 확장성을 이유로 현업에서는 아래와 같이 함수를 등록하고 사용한다
	function PRO2() {
		return new Promise( function(resolve, reject) {
			let flg = true;
			if(flg) {
				return resolve('성공'); // 요청 성공시 
			} else {
				return reject('실패'); // 요청 실패시
			}
		});
	}


	function PRO3(str, ms) {
		return new Promise( function(resolve) { // 프로미스객체를 리턴해서 함수로 만들어주고 사용해야함
			setTimeout(() => {
				console.log(srt);
				return resolve();
			}, ms);
		});
	}

	PRO3('A', 3000) // 프로미스 객체를 사용 하는 방법
	.then( () => PRO3('B', 2000) )
	.then( () => PRO3('C', 1000) );

	