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
