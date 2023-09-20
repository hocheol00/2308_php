<?php

try {
    // 예외상황이 발생할만한 소스코드(우리가 처리하고 싶은 소스코드)
    echo "try 실행\n";
    throw new exception("강제 예외 발생");
    echo "try 종료\n";
} catch( Exception $e ) {
    // 예외상황 발생 시 실행
    echo "catch 실행\n";
    echo $e->getmessage(),"\n"; // 에러메세지 출력하는 방법 throw 문구 가져와서 실행0 
} finally {
    // 정상이든, 예외발생이든 무조건 실행
    echo "finally 실행\n";
}



// 1. 디자인 및 구현
    // - figma 등 디자인 툴 사용
// 2. DB 설계 및 구현
    // - ERD 작성
    // - DB 구현
// 3. 어플리케이션단 소스코드 구현 및 디자인 퍼블리싱