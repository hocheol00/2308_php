INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500001
	,NOW()
	,'Bocknami'
	,'Choi'
	,'M'
	,NOW()
);

FLUSH PRIVILEGES;