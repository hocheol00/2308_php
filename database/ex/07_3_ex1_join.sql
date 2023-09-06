-- 0.JOIN이란?
--  두개 이상의 테이블을 묶어서 하나의 겨로가 집합으로 출력하는 것입니다.

-- 1. INNER JOIN의 구조 (공통된 부분만 가져온다 교집합)
-- 	SELECT 컬럼1, 컬럼2
-- 	FROM 테이블1 INNER JOIN 테이블2
-- 	ON 조인 조건
--  [WHERE 검색조건]

SELECT 
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
		
		
		
-- 2. OUTER JOIN :
-- 		기준이 되는 테이블의 레코드 조인의 조건에 만족되지 않아도 출력
-- 		SELECT 컬럼1, 컬럼2
-- 		FROM 테이블1
-- 		[LEFT | RIGHT] OUTER JOIN 테이블2
-- 		ON 조인 조건
--  	[WHERE 검색조건]

SELECT emp.emp_no
		,emp.first_name
		,dm.dept_no
FROM employees emp
	left OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110000;


-- 	union은 줄복 값을 제거하고 출력하고, union all은 중복 값도 출력합니다.
SELECT * FROM employees WHERE emp_no = 10001 OR emp_no = 10005
UNION all
SELECT * FROM employees WHERE emp_no = 10005;

-- 4.self join : 자기 자신으 ㄹ조인
-- select 컬럼1, 컬럼2..
-- from 테이블1
-- inner join 테이블1
-- where 검색조건;

-- 슈퍼바이저인 사원의 모든 정보를 출력해주세요
SELECT emp2.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no
--  sup_no 만들어서 추가하기
ALTER TABLE employees ADD COLUMN sup_no INT(11);

SELECT 
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();



-- 1. 사원의 사원번호, 풀네임, 직챙명을 출력해 주세요
SELECT emp.emp_no
		,CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,t.title
FROM employees AS emp
	INNER JOIN titles AS t
		ON emp.emp_no = t.emp_no;
		
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해주세요
SELECT emp.emp_no
		,emp.gender
		,sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >=NOW();
		
-- 3.10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해주세요
SELECT CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,sal.salary
		,emp.emp_no
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND emp.emp_no = 10010;
		
-- 4.사원의 사원번호, 풀네임, 소속부서명을 출력해주세요
SELECT emp.emp_no 
		,CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,dpm.dept_name
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
	INNER JOIN departments AS dpm
		ON dp.dept_no = dpm.dept_no
		AND dp.to_date >= NOW()
		;

-- 5.현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력
SELECT emp.emp_no 
		,CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
		order BY sal.salary  desc
		LIMIT 10;
		
-- 6.현재 각 부서의 부서장의 부서명, 풀네임, 입사일을출력해 주세요
SELECT dpm.dept_name
		,CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,emp.hire_date
FROM employees AS emp
	INNER JOIN dept_manager AS dp
		ON emp.emp_no = dp.emp_no
	JOIN departments AS dpm
		ON dp.dept_no = dpm.dept_no
		AND dp.to_date >= NOW();
		
-- 7.현재 직책이 "staff"인 사원의 현재 전체 평균 월급을 출력
SELECT avg(sal.salary)
		,t.title
FROM titles AS t
	JOIN salaries AS sal
	 	ON sal.emp_no = t.emp_no
	 	AND sal.to_date >= NOW()
		AND t.to_date >= NOW()
		and t.title = 'staff'
GROUP BY t.title;
	 	
-- 8.부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력
SELECT CONCAT(emp.first_name, ' ', emp.last_name) as FULL_name
		,emp.hire_date
		,emp.emp_no
		,dpm.dept_no
FROM employees AS emp
	INNER JOIN dept_manager AS dpm
		ON emp.emp_no = dpm.emp_no;

-- 9.현재 각 직급별 평균월급 중60,000이상인 직급의 직급명, 평균월급(정수)을 내림차순으로 출력
SELECT t.title
		,floor(AVG(sal.salary)) avg_sal
FROM titles AS t
	JOIN salaries AS sal
		ON t.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
		AND t.to_date >= NOW()
GROUP BY t.title
	HAVING avg_sal >= 60000
ORDER BY avg_sal DESC;

-- 10 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요
SELECT title, COUNT(*)	
	FROM titles AS t
	INNER JOIN employees AS emp
		ON t.emp_no = emp.emp_no
		AND t.to_date >= NOW()
where emp.gender = 'f'
		GROUP BY t.title;



-- 11.퇴사한 여직원의 수
SELECT emp.gender, COUNT(*)
FROM employees AS emp
	JOIN (
		SELECT emp_no
		FROM titles t
		GROUP BY t.emp_no
		HAVING MAX(t.to_date) != 99990101
		) as tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender
HAVING emp.gender = 'f';
	




