<?php
// cookie : 데이터를 브라우저에 저장
// 쿠키사용 주의점
//보안에 매우 취약하므로 개인정보, 민감정보 등 보안상 공개하면 안되는 데이터는 저장하면 안된다
// 4byte까지 저장 된다.
//키와 값으로 된  문자열만 저장 가능

//쿠키 생성
setcookie("myCookie", "홍길동", time()+30);
