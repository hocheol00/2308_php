-- 1. 스토어드 프로시저(STORED PROCEDURE)
-- 	일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합
-- 	
-- 2. 스토어드 프로시저의 장점
-- 	-하나의 요청으로 여러 SQL 실행하여, 네트워크에 대한 부하감소
-- 	-미리 구문 분석 및 내부 중간 코드로 변환을 끝내야 하므로 처리 시간이 감소
-- 	-데이터베이스 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가 가능
-- 3. 스토어드 프로시저의 단점
-- 	- 사양 변경 시 외부 응용 프로그램과 할께 프로시저의 정의 변경이 필요
-- 	- 코드 자산으로서의 재사용성이 매우 비효율적
-- 
-- 4. 프로시저 확인
	show procedure status;
-- 
-- 5. 프로시저 생성
-- 	5-1. DELIMITER
-- 		DELIMITER를 이용하여 지정된 문자가 나타나기 전까지는 ;을 만나도 쿼리가 실행되지 않게 방지
-- 
-- 	5-2. IN
-- 		프로시저를 호출하기 위해 필요한 정보들로 함수의 매개변수
-- 	
-- 	5-3. OUT
-- 		프로시저의 반환값
-- 	
-- 	5-4. DECLARE
-- 		프로시저 내부에서 사용하는 지역 변수를 선언할 때 사용
-- 
-- 	5-5. SET
-- 		변수의 값을 설정할 때 사용
-- 
-- 	5-6. 기본 구조
-- 		DELIMITER $$
-- 		CREATE PROCEDURE 프로시저명(
-- 			IN 변수명 데이터타입
-- 			, OUT 변수명 데이터타입
-- 		) 
-- 		BEGIN
-- 			프로시저의 실행 내용 정의
-- 		END $$
-- 		DELIMITER ;
-- DELIMITER $$
-- CREATE PROCEDURE test()
-- BEGIN
-- 		SELECT emp.*
-- 		,tit.title
-- 	FROM employees emp
-- 		JOIN titles tit
-- 			ON emp.emp_no = tit.emp_no
-- 			AND tit.to_date >= NOW();
-- END $$
-- DELIMITER ;


-- 6. 프로시저 호출
-- 	CALL 프로시저명(매개변수);
CALL test();
-- 
-- 7. 프로시저 삭제
-- 	DROP PROCEDURE 프로시저명;
DROP PROCEDURE test;

delimiter $$
CREATE PROCEDURE test()
BEGIN
	SELECT emp.*, tit.title
	FROM employees emp
		INNER JOIN titles tit
			ON emp.emp_no = tit.emp_no
			and tit.to_date >= NOW();
END $$
delimiter;

SHOW PROCEDURE STATUS;

CALL test();

DROP PROCEDURE test;


-- 1.스토어드 함수 (STORED FUNCTION) 란?
- 개발자가 필요에 따라 직접 만들어서 사용하는 함수
-- 
-- 2. 스토어드 함수의 특징
-- 	- 스토어드 프로 시저와 달리 파라미터에 IN, OUT 등이 사용 불가
-- 	- 파라미터는 모두 입력 파라미터로 사용
-- 	- return문으로 반환 할 값의 데이터 타입을 지정, 본문 안에서 return문으로 하나의 값을 반환
-- 	- 스토어드 함수 안에서는 SELECT문을 사용 불가
-- 	- 호출은 SELECT문에서 가능
-- 	- 연산을 통해 하나의 값을 반환
-- 
-- 3. 스토어드 함수 조회
SHOW FUNCTION STATUS;
	
-- 4. 스토어드 함수 생성
-- 	DELIMITER $$
-- 	CREATE FUNCTION 함수명(매개변수명 데이터타입)
-- 		RETURNS 데이터타입
-- 	BEGIN
-- 		RETURN 반환값;
-- 	END $$
-- 	DELIMITER ;

DELIMITER $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS INT
BEGIN
	RETURN num1 + num2;
END $$
DELIMITER $$

-- 5. 스토어드 함수 실행
SELECT my_sum(100, 2);

-- 6. 스토어드 함수 삭제
DROP FUNCTION my_sum;


SHOW FUNCTION STATUS;

delimiter $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS int
BEGIN
	RETURN num1 + num2;
END $$
delimiter;

SELECT my_sum(1,2);

