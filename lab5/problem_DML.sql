SELECT name FROM member WHERE join_date > '2000-09-01';
SELECT * FROM member WHERE join_date BETWEEN '1995-10-01' AND '2019-10-01';
SELECT book.* FROM book JOIN publisher ON book.pub_id = publisher.pub_id WHERE publisher.name = 'Oxford' OR (book.price BETWEEN 15 AND 20);
SELECT * FROM BOOK WHERE pub_id = (SELECT pub_id FROM PUBLISHER WHERE name = 'Oxford') OR (price BETWEEN 15 AND 20);