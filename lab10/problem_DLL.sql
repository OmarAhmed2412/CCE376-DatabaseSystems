CREATE DATABASE crs;

USE crs;
CREATE TABLE department (
    dept_id INT PRIMARY KEY,
    dept_name VARCHAR(255) NOT NULL
);

CREATE TABLE student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    major VARCHAR(255),
    level VARCHAR(10),
    age INT
);

CREATE TABLE professor (
    prof_id INT PRIMARY KEY,
    prof_name VARCHAR(255) NOT NULL,
    dept_id INT,
    FOREIGN KEY (dept_id) REFERENCES department(dept_id)
);

CREATE TABLE course (
    course_code VARCHAR(10) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE semester_course (
    course_code VARCHAR(10),
    quarter VARCHAR(10) NOT NULL,
    year INT NOT NULL,
    prof_id INT,
    PRIMARY KEY (course_code, quarter, year),
    FOREIGN KEY (course_code) REFERENCES course(course_code),
    FOREIGN KEY (prof_id) REFERENCES professor(prof_id)
);

CREATE TABLE enrolled (
    student_id INT,
    course_code VARCHAR(10),
    quarter VARCHAR(10) NOT NULL,
    year INT NOT NULL,
    enrolled_at DATE NOT NULL,
    PRIMARY KEY (student_id, course_code, quarter, year),
    FOREIGN KEY (student_id) REFERENCES student(student_id),
    FOREIGN KEY (course_code, quarter, year) REFERENCES semester_course(course_code, quarter, year)
);
