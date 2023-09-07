-- 1. 스토어드 프로시저(STORED PROCEDURE)
-- 	일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합
-- 	
-- 2. 스토어드 프로시저의 장점
-- 	-하나의 요청으로 여러 SQL 실행하여, 네트워크에 대한 부하감소
-- 	-미리 구문 분석 및 내부 중간 코드로 변환을 끝내야 하므로 처리 시간이 감소
-- 	-데이터베이스 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가 가능


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

SHOW FUNCTION STATUS;

delimiter $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS int
BEGIN
	RETURN num1 + num2;
END $$
delimiter;

SELECT my_sum(1,2);

SELECT * FROM employees ORDER BY emp_no DESC;
SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;
SELECT * FROM dept_emp ORDER BY emp_no DESC;

-- 1사원 정보테이블에 각자의 정보를 적절하게 넣어주세요
insert INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	5000001
	,19970702
	,'hocheol'
	,'shin'
	, 'M'
	,99990101
);

-- 2.월급,직책,소속부서 테이블에 각자의 정보를 적절하게 넣어주세요
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Jjolttagu'
	,20230907
	,99990101
);

-- 3.짝궁의 [1,2]것도 넣어주세요
insert INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19970703
	,'jueun'
	,'yang'
	, 'f'
	,20230817
);
-- 4.나와 짝궁의 소속 부서를 d009로 변경해 주세요
--  기존데이터 유지하고(to_date를 오늘 날자로 변경 후 insert into로 새로운 나의 데이터를 넣어야한다)
UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no = 500002;

-- 5.짝궁의 모든 정보를 삭제해 주세요.

DELETE FROM employees
WHERE emp_no = 500002;

-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET emp_no = 5000001 
WHERE dept_no = 'd009'
AND to_date >= NOW();

SELECT * from dept_manager;
-- 7.오늘 날짜부로 나의 직책을 'senior engineer'로 변경해 주세요
UPDATE titles
SET title = 'senior engineer'
WHERE emp_no = 5000001
AND to_date >= NOW();
-- 8.최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
-- 서브쿼리 min,max 사용
SELECT emp.emp_no
		,emp.last_name
		,sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE salary =
		(SELECT MAX(salary)FROM salaries)
		or
		salary =
		(SELECT MIN(salary)FROM salaries);
-- order by 사용 		
SELECT emp.emp_no
		,emp.last_name
		,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND (
		salary = (SELECT salary FROM salaries ORDER BY salary LIMIT 1)
		OR
		salary = (SELECT salary FROM salaries ORDER BY salary DESC LIMIT 1)
		);
		
-- 9.전체 사원의 평균 연봉을 출력해 주세요.
SELECT AVG(salary)
FROM salaries;
	
-- 10. 사번이 499,975인사원의 지금까지 평균 연봉을 출력해 주세요

SELECT AVG(salary)
FROM salaries
WHERE emp_no = 499975;

SELECT AVG(s.salary), t.title
FROM titles t
INNER JOIN salaries s
ON t.emp_no = s.emp_no
GROUP BY t.title; 