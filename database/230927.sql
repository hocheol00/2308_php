-- 1직책테이블의 모든 정보를 조회해주세요
SELECT *
FROM titles;
-- 2. 급여가 60,000 이하인 사원의 사번을 조회해 주세요.
SELECT emp_no
FROM salaries
WHERE salary <= 60000;
-- 3. 급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요.
SELECT emp_no
FROM salaries
WHERE salary BETWEEN 60000 AND 70000;
-- 4.사원번호가 10001,10005인 사원의 모든 정보를 조회해 주세요
SELECT *
FROM employees
WHERE emp_no IN(10001,10005);

-- join 문
SELECT
	emp.*
	,dmp.dept_to
	,dept.dept_name
	,tit.title
	,sal.slary
FROM employees emp
	JOIN dept_emp dmp
		ON emp.emp_no = dmp.emp_no
		AND dmp.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
	JOIN departments dept
	ON dmp.dmpt_no = dept.dept_no
WHERE
 emp.emp_no = 10001 or emp.emp_no = 10005;



-- 5.직급명에 "engineer"가 포함된 사원의 사번과 직급을조회해 주세요
SELECT emp.emp_no
		,tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		and tit.title LIKE '%Engineer%'
		AND tit.to_date >= NOW();
-- 6. 사원 이름을 오름차운스올 정렬해서 조회해 주세요
SELECT *
FROM employees
ORDER BY first_name asc;
-- 7.사원별 급여의 평균을 조회해 주세요
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;
-- 8.사원별 급여의 평균이 30,000 ~50,000인, 사원번호와 평균급여를 조회해 주세요
SELECT emp_no, AVG(salary) avgsal
FROM salaries
GROUP BY emp_no
HAVING avgsal >= 30000
	and avgsal <= 50000;
-- 9.사원별 급여 평균이 70,000이상인, 사원의 사번, 이름 , 성 , 성별을 조회해 주세요
SELECT
	emp.emp_no
	,emp.first_name
	,emp.last_name
	,emp.gender
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no;
GROUP BY sal.emp_no
HAVING AVG(sal.salary) >= 70000;
-- 10 현재 직책이 "Senior Engineer"인, 사원의 사원번호와 성을 조회해 주세요
SELECT
	emp.emp_no
	,emp.last_name
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.title = "Senior Engineer"
		AND tit.to_date >= NOW();
		
		
		
		
		
