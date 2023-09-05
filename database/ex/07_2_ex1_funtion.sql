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
		,IFNULL(to_date, DATE(NOW())) AS to_date2
FROM titles
ORDER BY emp_no DESC;

-- 사원의 사번 직책 직책만료일자 를 사번의 내림차순으로 정렬해주세요 
-- ,단 직책만료일자가 NULL 경우 현재날자로 출력해주세요
-- 

-- NULLIF (수식1, 수식2) : 수식1과 2가 같으면 NULL을반환하고, 다르면 수식1을 반환

SELECT NULLIF(1,1);
SELECT NULLIF(1,2);

UPDATE titles
SET to_date = NULL
WHERE emp_no = 500000;


-- CASE ~ WHEN ~ ELSE ~END : 다중 분기를 위해 사용합니다.
-- 	예)
-- 		CASE 체크하려는 수식1
-- 			when 분기수식1 then 결과1
-- 			when 분기수식2 then 결과2
-- 			when 분기수식3 then 결과3
-- 			ELSE 결과4
-- 		end
SELECT e.emp_no
	,e.gender
	,case e.gender
		when 'm' then '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees AS e;	

UPDATE titles
SET to_date = null
WHERE emp_no = 500000;

SELECT *
FROM titles
ORDER BY emp_no DESC;

-- 예시문제
-- 직책 테이블의 모든 정보를 출력해 주세요
-- to_date가 null || 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은아님'

SELECT *
	,case date(ifnull(to_date, 99990101))
		when NULL then '현재직책'
		when 99990101 then '현재직책'
		ELSE '지금은 아님' 
	END AS nt
FROM titles
ORDER BY emp_no DESC;

SELECT *
FROM titles
WHERE to_date IS NULL;

-- 3. 문자열 함수
-- 	concat(문자열1, 문자열2,...) : 문자열을 이어줍니다
SELECT CONCAT ('안녕', '하세요');
-- 	concat_ws (구분자/, 문자열1, 문자열2, ...) : 문자열 사이에 구분자를 넣고 이어줍니다
SELECT CONCAT_WS('/', '딸기', '바나나', '토마토','수박');
-- 	format(숫자, 소숫점 자릿수) : 숫자에','를 넣어주고 소수점 자릿수 까지 표현합니다
SELECT FORMAT(123456,2);


-- left(문자열,길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환
SELECT LEFT('123456' ,3);
-- right(문자열,길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환
SELECT right('123456' ,3);
-- upper(문자열) : 소문자를 대문자로 변경
SELECT UPPER('abcd');
-- lower(문자열) : 대문자를 소문자로 변경
SELECT lower('ABCD');

-- lpad(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣어준다
SELECT LPAD('2', 5, '1가');
-- rpad(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣어준다
SELECT rPAD('2', 5, '1가');

-- trim(문자열) : 좌우 공백을 제거합니다
--  trim 쓰고 안쓰고 비교
SELECT '1234 ', TRIM('1234');
-- ltrim(문자열) : 왼쪽 공백을 제거합니다
-- Rtrim(문자열) : 오른쪽 공백을 제거합니다

-- substring(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING('abcdef', 3, 2);
-- substring_index(문자열, 구분자, 횟수) : 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING_INDEX('ab.cd.ab.ef', '.', 3);

-- 4. 수학 함수
-- 	ceiling(숫자) : 올림합니다.
SELECT CEILING(1.1);
-- 	floor(숫자) : 버림합니다.
SELECT FLOOR(1.9);
-- 	round(숫자) : 반올림 합니다
SELECT ROUND(1.6), ROUND(1.4);
-- 5. 날짜 및 시간 함수
-- 	now() : 현재 날짜/시간을 구합니다 (yyyy-mm-dd)
SELECT NOW(), DATE(NOW()), DATE(99990101);

-- 	adddate(날자1, interbal 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다
SELECT ADDDATE(99990101, INTERVAL 1 DAY);
SELECT ADDDATE(99990101, INTERVAL 1 MONTH);
-- 	addtime(날짜/시간, 시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다
SELECT ADDTIME(20230101000000, '01:00:00');

SELECT ADDdate(date(NOW()), interval -1 YEAR);

-- 6.순위 함수
-- 	rnak()over(order by 속성 명 desc/asc) : 순위를 매깁니다
SELECT emp_no, salary
		,RANK() OVER(ORDER BY salary desc) AS rank
FROM salaries
LIMIT 10;

-- 	row_number() over(order by 속성명 desc/asc) : 레코드에 순위를 매깁니다
SELECT emp_no, salary
		,row_number() OVER(ORDER BY salary desc) AS num
FROM salaries
LIMIT 10;

