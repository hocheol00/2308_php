
-- SELECT [컬럼명] form [테이블명];
select * FROM employees;
SELECT * FROM dept_emp;

--
SELECT first_name, last_name FROM employees;

SELECT emp_no, title FROM titles;

-- SELECT [컬럼명] form [테이블명] where [쿼리 조건];
-- --[쿼리 조건] : 컬럼명 [기호] 조건값
SELECT * from employees WHERE emp_no = 10009;
SELECT * FROM employees WHERE first_name = 'mary';
SELECT * FROM employees WHERE birth_date < 19600101;

-- and 연산자
SELECT * FROM employees
WHERE birth_date <= 19700101
  AND birth_date >= 19650101;

SELECT * FROM employees
WHERE first_name = 'mary'
  or last_name = 'piazza';
  
--
SELECT * FROM employees
WHERE emp_no >= 10005
  AND emp_no <= 10010;
  
SELECT *
FROM employees
WHERE emp_no between 10005 AND 10010;

-- or , in()으로 해당 데이터 조회
SELECT *
FROM employees
WHERE emp_no in(10005, 10010);

SELECT *
FROM employees
where emp_no = 10005 OR emp_no = 10010;

-- 이름이 %뒤에 붙이면'ge'로 시작하는 사람
-- %앞에 넣으면 'ge'로 끝나는사람
-- %ge% 'ge'가 들어가있는사람

SELECT *
from employees
WHERE first_name LIKE('%ge');
SELECT *
from employees
WHERE first_name LIKE('ge%');
SELECT *
from employees
WHERE first_name LIKE('%ge%');

SELECT *
FROM titles
WHERE title LIKE ('%staff');

SELECT *
FROM employees
WHERE first_name LIKE ('___ge');

-- --ORDER BY 정렬하여 조회
SELECT * FROM employees ORDER BY birth_date asc;
SELECT * FROM employees ORDER BY birth_date DESC;

SELECT * FROM employees ORDER BY birth_date, first_name;

--
SELECT * FROM employees
ORDER BY last_name DESC, first_name ASC, birth_date ASC;

-- distinct로 중복되는 레코드 없이 조회
SELECT emp_no, salary FROM salaries WHERE emp_no = 10001;
SELECT distinct emp_no, salary FROM salaries WHERE emp_no = 10001;

-- 정보 추가 하는 방법 간단하게
INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
COMMIT;

-- 5.집계함수 
SELECT SUM(salary) FROM salaries;
-- --현재 받고있는 급여만 조회해주세요
SELECT * FROM salaries WHERE to_date = 99990101;

SELECT sum(salary) FROM salaries WHERE to_date = 99990101;
SELECT MAX(salary) FROM salaries WHERE to_date = 99990101;
SELECT min(salary) FROM salaries WHERE to_date = 99990101;
SELECT avg(salary) FROM salaries WHERE to_date = 99990101;

--COUNT(컬럼명):개수를 구합니다
SELECT COUNT(*) FROM employees;

SELECT COUNT(*) FROM employees where FIRST_name ='mary';

-- --그룹으로 묶어서 조회: group by 컬럼명[having 집계함수조건]
-- 그룹바이에 적혀있는 컬럼명만 헤빙에 적을수 있다.
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');

-- --현재 재직중인 직원들의 직급별 수를 구해주세요.
-- --AS: (직계함수를썼을떄 사용하면 좋다) 컬럼명  이름을 내가 지정할수있다

SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title;

-- concat() : 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees;
-- 사번 생일 풀네임 여자사원
SELECT emp_no, birth_date, CONCAT(first_name, ' ', last_name) AS full_name
from employees
WHERE gender = 'f'
ORDER BY full_name ASC;

-- --LIMIT 출력 개수를 제한하여 조회
-- --LIMIT n : n개수만큼 쿨력
-- --LIMIT n OFFSET n : n번째 부터 n개만큼 출력

SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 10;

SELECT *
FROM salaries
WHERE to_date >=99990101
ORDER BY salary desc
LIMIT 5;

-- 서브쿼리(subquery): 쿼리 안에 또다른 쿼리가 있는 형태
-- --d002 부서의 현재 매니저의 이름을 가져오고 싶다
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM dept_manager
	WHERE to_date>= 20230901
     AND dept_no = 'd002'
);
-- 
-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해주세요

SELECT emp_no, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date>= 20230901
	ORDER BY salary DESC
	LIMIT 1);

-- 서브쿼리의 결과가 복수일때 사용방법	
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001');
	
-- 현재직책이 senior engineer인 사원의 사번과 생일을 출력해주세요
SELECT emp_no, birth_date
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM titles
	WHERE title = 'senior engineer'
	  AND to_date>= 20230901 );
	  
-- 다중열 서브쿼리
-- 현재 부서장인 사람의 소속부서테이블의 모든 정보를 출력해주세요
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- select 절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기시작한 일자, 풀네임을 출력해주세요
SELECT sal.salary, sal.from_date,
	(	SELECT CONCAT(emp.first_name, ' ', emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE sal.TO_date>= NOW();

-- from 절에 오는 서브쿼리
SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'm') AS emp;
