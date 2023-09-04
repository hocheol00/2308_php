-- 숫자 데이터 형식
-- int : 4byte 정수, +21억 ~-21억 까지가 범위
-- BIGTINT : 8byte 정수, 범위 +900경 ~ -900경
-- FLOAT : 4byte 실수, 소수점 아래 7자리까지 표현
-- DOUBLE : 8byte 실수 소수점 아래 15자리까지 표현
-- DECIMAL : 5~15byte, 소수점 아래 자리를 지정가능
-- 예 ) decimal : (6,2) 결과값 (9999.99)



-- 문자 데이터 형식
--  char(n) : 1~255byte ,n만큼 고정길이를 가지는 문자형
-- varchar(n) : 1~65535byte, n만큼  가변길이를가지는 문자형
-- longtext : 최대 4gb, text 데이터값을 저장
-- longblob : 최대 4gb, blob 데이터 값을 저장
-- enum(값1, 값2, 값3,....) : 정해진 값만 입력 가능하도록  하는 데이터 형식


-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'YYYY-MM-DD' 날짜까지 저장
-- DATETIME : 8byte, 'YYYY-MM-DD hh:mi:ss' , 시간까지 저장
-- TIMESTAMP : 4byte, 'YYYY-MM-DD hh:mi:ss' , 시간까지 저장
-- 	,datetime 과  timestamp의 차이는 
-- 	datetime : 서버 시간에 상관없이 고정되는 데이트 타입
-- 	timestamp : 서버 시간에 따라 유동적으로 변하는 타입