//1. DOM (Document Object Model)이란? - 교제 p.679 그림참조
// - 웹 문서를 제어하기 위해서 웹 문서를 개체화한 것
// - DOM API를 통해서 html의 구조나 내용 또는 스타일등을 동적으로 조작

// 2.요소 선택
// 2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title')
const subTITLE = document.getElementById('subtitle')
TITLE.style.color = 'blue';
// subtitle.style.backgroundcolor = 'beige';

// 2-2. 태그명으로 요소를 선택(해당 요소들을 컬렉션 객체로 가져온다)
const H2 = document.getElementsByTagName('h2');

// 2-3. 클래스명으로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

//2-4 CSS선택자를 사용해 요소를 찾는 메소드
// querySelector : 복수일 경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

// querySelectorAll : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

// ------------------
//3. 요소 조작
// textContent : 순수한 텍스트 데이터를 전달 
TITLE.textContent = '집 가고 싶다';

// innerHTML : 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<P>탕수육</P>'


// setAttribute('', '') : 요소에 속성을 추가
// ** 몇몇 속성들은 dom객체에서 바로 설정 가능
// ex ) INTXT.placeholder = '바로 접근 가능';
const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placholder', '셋어트리뷰트로 삽입');
// removeAttribute('') :요소의 속성을 제거
INTXT.removeAttribute('placeholder');

// 4. 요소 스타일링
//style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가
// TITLE.classList.add('class1', 'class2');

//---------------------
// 5. 새로운 요소 생성
//요소 만들기
const LI = document.createElement('li');
LI.innerHTML = '빵빵이 졸귀 ㅋㅋ'

// 삽입할 부모 요소 접근
const UL = document.querySelector('#ul'); // 2번째 방법
// const UL = document.getElementById('ul'); // 아이디 가져오는 방법 1

//부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI);

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('ul li:nth-child(3)');

UL.insertBefore(LI, SPACE);
// 요소를 삭제하는 방법
// LI.remove();




// 1. 사과게임 위에 '장기'를 넣어주세요
let LI2 = document.createElement('li');
const AGAME = document.querySelector('li:nth-child(5)');
LI2.innerHTML = '장기'
UL.insertBefore(LI2, AGAME);
// 2.어메이징브릭에 베이지 배경색을 넣어주세요
const AMAZING = document.querySelector('li:last-child');
AMAZING.style.backgroundColor = 'beige';
// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파랑색 글씨로 만들어주세요

const UL2 = document.querySelectorAll('li');
let length2 = UL2.length;

for (let i = 1; i <= length2; i++) {
	if( i % 2 === 0) {
		UL2[i-1].style.color = 'red';
	} else {
		UL2[i-1].style.color = 'blue';
	}
} 

//------------
// 3번 문제  even,odd 로 사용하는 방법
// const EVEN = document.querySelectorAll('li:nth-child(even)');
// for(let i =0; i<EVEN.length; i++) {
// 	EVEN[i].style.color = 'red';
// }
// const ODD = document.querySelectorAll('li:nth-child(odd)');
// for(let i=0; i < ODD.length; i++) {
// 	ODD[i].style.color = 'blue';
// }



//참조 사이트
// Document
// https://developer.mozilla.org/ko/docs/web/API/Document
// DOM 속성
// https://developer.mozilla.org/en/docs/web/API/Element