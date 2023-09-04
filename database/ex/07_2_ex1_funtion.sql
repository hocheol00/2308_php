-- 1. 데이터 타입 변환 함수

SELECT cast(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

-- 2.제어 흐름 함수
-- IF(수식, 참일 떼, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT e.emp_no, if(e.gender = 'm', '남자', '여자') AS gender
FROM employees e;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 출력하고
-- 									,수식 1이 NULL이 아니면 수식1를 반환된다

SELECT IFNULL(null, '수식2');

SELECT emp_no
		,title
		,to_date
		,IFNULL(null, DATE(NOW())) AS to_date2
FROM titles
ORDER BY emp_no DESC;

-- NULLIF (수식1, 수식2) : 수식1과 2가 같으면 NULL을반환하고, 다르면 수식1을 반환

SELECT NULLIF(1,1);
SELECT NULLIF(1,2);