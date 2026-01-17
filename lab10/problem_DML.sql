SELECT DISTINCT s.student_name
FROM student AS s
JOIN enrolled AS e ON s.student_id = e.student_id
JOIN semester_course AS sc ON e.course_code = sc.course_code AND e.quarter = sc.quarter AND e.year = sc.year
WHERE s.level = 'SR' AND sc.prof_id = 1;

SELECT s.student_name, c.name AS course_name
FROM student AS s
LEFT JOIN enrolled AS e ON s.student_id = e.student_id
LEFT JOIN course AS c ON e.course_code = c.course_code;

SELECT p.prof_name 
FROM professor AS p
LEFT JOIN semester_course AS sc ON p.prof_id = sc.prof_id 
LEFT JOIN enrolled AS e ON sc.course_code = e.course_code AND sc.quarter = e.quarter AND sc.year = e.year 
GROUP BY p.prof_id, p.prof_name 
HAVING COUNT(DISTINCT e.student_id) < 5 OR COUNT(DISTINCT e.student_id) IS NULL;

SELECT s.student_name
FROM student AS s
JOIN enrolled AS e ON s.student_id = e.student_id
JOIN semester_course AS sc ON e.course_code = sc.course_code
WHERE sc.prof_id = 2
GROUP BY s.student_id, s.student_name
HAVING COUNT(DISTINCT sc.course_code) = (
    SELECT COUNT(course_code)
    FROM semester_course
    WHERE prof_id = 2
);

SELECT p.prof_id, p.prof_name
FROM professor as p
LEFT JOIN semester_course as sc
ON p.prof_id = sc.prof_id
WHERE p.dept_id IN (1, 2, 3, 4)
GROUP BY p.prof_id, p.prof_name
HAVING COUNT(sc.course_code) < 2;

SELECT c.name AS course_name, c.course_code, p.prof_name, p.prof_id
FROM course AS c
JOIN semester_course AS sc ON c.course_code = sc.course_code
JOIN professor AS p ON sc.prof_id = p.prof_id
GROUP BY c.course_code, p.prof_id
HAVING COUNT(sc.course_code) >= 2;