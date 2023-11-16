const MYURL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN = document.querySelector("#btn");
BTN.addEventListener("click", my_fetch);
const BTNDELETE = document.querySelector("#btn-delete");
BTNDELETE.addEventListener("click", my_delete);

function my_fetch() {
  const INPUT = document.querySelector("#input");

  fetch(INPUT.value.trim())
    .then((response) => {
      if (response.status >= 200 && response.status < 300) {
        return response.json();
      } else {
        console.log(response);
        throw new Error("에러");
      }
    })
    .then((data) => makeImg(data))
    .catch((error) => console.log(error));
}

function makeImg(data) {
  data.forEach((item) => {
    const TAG_DIV = document.createElement("div");
    const TAG_IMG = document.createElement("img");
    const TAG_P = document.createElement("p");
    const DIV_IMG = document.querySelector("#div-img");
    TAG_P.innerHTML = item.id;
    TAG_IMG.setAttribute("src", item.download_url);
    TAG_IMG.style.width = "200px";
    TAG_IMG.style.height = "200px";
    TAG_DIV.style.backgroundColor = "grey";
    TAG_P.style.textAlign = "center";
    TAG_P.style.margin = "0px";
    TAG_P.style.paddingBottom = "10px";
    TAG_P.style.fontSize = "20px";
    TAG_DIV.style.padding = "10px";
    DIV_IMG.appendChild(TAG_DIV); //
    TAG_DIV.appendChild(TAG_P);
    TAG_DIV.appendChild(TAG_IMG);
  });
}

// 삭제 함수
function my_delete() {
  const IMG = document.querySelectorAll("img");
  for (let i = 0; i < IMG.length; i++) {
    IMG[i].remove();
  }
}
