// 1. HTTP ( Hypertext Transfer Protocol) 란?
// 	어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
// 	클라이언트가 서버에 데이터를 request(요청)을 하고
// 	서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
// 	Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지등을 모두 포함 합니다

// 2. AJAX ( Asynchronous JavaScript And XML) 이란 ?
	// 웹페이지에서 비동기 박ㅇ식으로 서버에게 데이터를 request하고,
	// 서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식
	// 즉, 웹 페이지를 전체를 다시 로딩하지 않고도 일부분만 갱신 할수 있다
	// 우리는 fetch api 방식 으로 한다

// <xml>
// 	<data>
// 		<id>56</id>
// 		<name>호철임</name>
// 	</data>
// </xml>

// 3. JOSN ( JavaScript Object Notation) 이란?
	// JavaScript 의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷
	// 장점
	// 	-데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
	// 	- 가벼운 텍스트를 기반
	// 	- 가독성이 좋음
	// 	- key 와 value가 짝을 이루고 있음
	// 	- 데이터를 서버와 주고 받을 때 직렬화 하기위해 사용
	// 	- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

	//json
	// {
		// date: {
		// // 	id:56
		// // 	,name: '호철임'
		// }
	// }



	const MYURL = "https://picsum.photos/v2/list?page=2&limit=5";
	const BTNAPI = document.querySelector('#btn-api');
	BTNAPI.addEventListener('click', my_fetch);
	const BTNDELETE = document.querySelector('#btn-delete');
	BTNDELETE.addEventListener('click', my_delete);

	function my_fetch() {
		const INPUT_URL = document.querySelector('#input-url');

		fetch(INPUT_URL.value.trim())
		.then( response => {
			if( response.status >= 200 && response.status < 300 ){
				return response.json();
			} else {
				console.log(response)
				throw new Error('에러');
			}
		})
		.then( data => makeImg(data) )
		.catch( error => console.log(error) );
	}
	
	function makeImg(data) {
		data.forEach( item => {
			const TAGIMG = document.createElement('img');
			const DIVIMG = document.querySelector('#div-img');
			TAGIMG.setAttribute('src', item.download_url)
			TAGIMG.style.width = '200px';
			TAGIMG.style.height = '200px';
			DIVIMG.appendChild(TAGIMG);
		});
	}

	// function my_delete() {
	// 	let test = document.getElementsByTagName('img').length;
	// 	for(let i=0; i < test; i++){
	// 		const TAGIMG2 = document.querySelector('img');
	// 		TAGIMG2.remove();
	// 	}
		
	
	// }
	function my_delete() {
		const IMG = document.querySelectorAll('img');
		for(let i = 0; i < IMG.length; i++) {
			IMG[i].remove();
		}
	}
	

	//방법 2
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = "";



	// fetch 2번쩨 이규먼트 셋팅 방법
	function infinityLoop() {
		let apiurl = "https://192.168.0.82/03_insert.php"
		let init = {
			method: "POST"
			// ,headers: {
			// 	accept: '*'
			// }
			,body: {
				title: "빵빵이"
				,content: "푸바오"
				,EM_ID: "2"
			}
		};
		fetch(apiurl, init)
		.then( response => console.log(response) )
		.catch( error => console.log(error) );
	}