CREATE DATABASE lms;

USE lms;
CREATE TABLE CATEGORY(
    category_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(category_id)
); CREATE TABLE PUBLISHER(
    pub_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    PRIMARY KEY(pub_id)
); CREATE TABLE MEMBER(
    member_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    join_date DATETIME NOT NULL,
    PRIMARY KEY(member_id)
); CREATE TABLE BOOK(
    book_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    pub_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY(book_id),
    FOREIGN KEY(pub_id) REFERENCES PUBLISHER(pub_id),
    FOREIGN KEY(category_id) REFERENCES CATEGORY(category_id)
); CREATE TABLE BORROWING_BOOK(
    member_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATETIME NOT NULL,
    due_date DATETIME NOT NULL,
    return_date DATETIME,
    PRIMARY KEY(member_id, book_id, borrow_date),
    FOREIGN KEY(member_id) REFERENCES MEMBER(member_id),
    FOREIGN KEY(book_id) REFERENCES BOOK(book_id)
);