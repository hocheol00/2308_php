// AJAX = 자바스크립트와 X엠엘을 이용해서 비동기 처리 하는 통신을 위한 기술
//프론트가 백앤드로 비동기처리 하고싶을때 하는 기술이 AJAX
// API는 백앤드와 프론트가 통신을 하는 도구 역활

// JSON - 데이트 타입 '문자열' ,
// : 서버와 데이터를 주고받을때 주고받는 데이터 포맷형식

function getItem() {
  fetch("http://localhost:8000/api/item") // 패치가 서버 리퀘스트 날리는거 url을 적어야함
    .then(response => response.json()) // 레스폰스를 제이슨 형태로 바꾼는것 => 는 리턴이다
    .then(data => {
      let content = data.data[0].content;
      // JSON 데이터 내에 date 0번 인덱스의 content
      let cp = document.createElement('p');
      cp.innerHTML = content;
      document.body.appendChild(cp);
  })
    .catch(error => console.log(error));
  return false;
}


// 게시글 작성
function addItem() {
  fetch('http://localhost:8000/api/item', {
    method: 'POST',
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
        "data": {
          "content": "잘하고싶다.!!"
        }
    })
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.log(error))
}

//  게시글 수정
function updatedItem() {
  fetch('http://localhost:8000/api/item/1',{
    method: 'PUT',
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      "data": {
        // "content": "변경했습니다.!!"
        "completed": "1"
      }
  })
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.log(error))
}

//  게시글 삭제
function deletedItem() {
  fetch('http://localhost:8000/api/item/1',{
    method: 'DELETE',
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.log(error))
}
