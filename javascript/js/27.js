let arr = [1,2,3,4,5,];

// push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(2, 1); //배열의 arr[2]를 삭제, (첫번째는 방 번호, 두번째는 갯수)
// arr.splice(4,1);
// arr.splice(2, 0, 10); //배열의 arr[2]에 값이 10인 인덱스를 추가
// arr.splice(2, 2, 10); // 배열의 arr[2] 부터 시작해서 n개를 삭제하고 10을 넣겠다
arr.splice(2, 0, 10, 11, 12, 'aaa'); // 3번째 인자부터는 가변파라미터로써 모든 값을 추가

//indexOf() : 배열에서 특정 요소를 찾는데 사용
//arr.indexOf(4); 찾고자 하는 인덱스의 배열의 값을 찾음

//lastIndexOf() : 배열에서 특정 요소중 가장 마지막에 위치한 요소를 찾는데 사용
arr = [1, 1, 1, 3, 4, 5, 6, 6, 10];

//pop() : 배열의 가장 마지막 요소를 삭제
arr.pop();

let i_pop = arr.pop(); // 변수에 담아서 삭제를 확인

//sort(); : 배열을 정렬
arr = [5,4,6,7,3,2];
// let arr_sort = arr.sort( function(a, b) {
// 	return a - b;
// })

// let arr_sort = arr.sort((a, b) => a - b); 오름차순 정렬 화살표 기법
let arr_sort = arr.sort((a, b) => b - a); // 내림차순 정렬

//원본데이터와 별도의 새로(new) 배열을 만드는 방법 ( Value Copy 방식)
//밑의 경우 배열의 경우 원본데이터를 보존하고 새로 배열을 만들수 있다.
let arr2 = Array.from(arr);

//includes() : 배열의 특정요소를 가지고 있는지 판별 ( 리턴 값은 boolean 으로)
arr = ['치킨', '육회비빔밥', '비엔나'];

let boo_include = arr.includes('짜장면');

//join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
arr.join();
arr.join(' ');
arr.join(' / ');  //여러 방식으로 활용 가능

//map() : 배열의 모든요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// 모든 요소의 값 * 2의 결과를 배열로 얻는 방법
let arr_map = arr.map( num => num * 2);
// 3의 배수는 '짝' 으로 만드는 코드
arr_map = arr.map( num => {
	if( num % 3 === 0 ) {
		return '짝'
	} else {
		return num;
	}
});

//some() :주어진 함수를 만족하는 요소가 하나라도 있으면 true  (return boolean)
arr = [ 2 ,3 ,4 ,5 ,6 ,7 ,8 ,9];
let boo_some = arr.some( num => num > 8);
// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족 안하면 false
let boo_every = arr.every( num => num > 1);

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
arr = [ 2 ,3 ,4 ,5 ,6 ,7 ,8 ,9];
let boo_filter = arr.filter( num => num % 3 === 0); //3의 배수만 가져오기