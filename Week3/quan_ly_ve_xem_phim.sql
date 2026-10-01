CREATE DATABASE quan_ly_ve_xem_phim;

CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
);

-- 1. Thêm ít nhất 5 bộ phim
INSERT INTO movies (title, price, total_seats, available_seats)
VALUE
	('Avengers: Endgame', 120000, 100, 20),
    ('Spider-Man: No Way Home', 100000, 120, 50),
    ('Doraemon: Nobita', 80000, 80, 30),
    ('The Batman', 150000, 100, 70),
    ('Interstellar', 110000, 150, 40);

-- 2. Hiển thị toàn bộ phim
SELECT *
FROM movies;

-- 3. Hiển thị phim có giá vé lớn hơn 100000
SELECT *
FROM movies
WHERE price > 100000;

-- 4. Hiển thị phim còn nhiều hơn 50 ghế
SELECT movies.title
FROM movies
WHERE available_seats > 50;

-- 5. Sắp xếp phim theo giá vé giảm dần
SELECT *
FROM movies
ORDER BY price DESC;

-- 6. Cập nhật số ghế còn lại của một phim
UPDATE movies
SET available_seats = 15
WHERE id = 1;

-- 7. Xóa một phim
DELETE FROM movies
WHERE id = 4;

-- 8. Hiển thị số vé đã bán của từng phim: total_seats - available_seats
SELECT
    title,
    total_seats,
    available_seats,
    total_seats - available_seats AS sold_seats
FROM movies;

-- 9. Tính doanh thu của từng phim: (total_seats - available_seats) * price
SELECT
    title,
    price,
    total_seats - available_seats AS sold_seats,
    (total_seats - available_seats) * price AS revenue
FROM movies;

-- 10. Tính tổng doanh thu của tất cả các phim
SELECT SUM((total_seats - available_seats) * price) AS total_revenue
FROM movies;

-- 11. Tìm phim có số vé bán ra nhiều nhất
SELECT 
	title,
    total_seats,
    available_seats,
    (total_seats - available_seats) AS sold_seats 
FROM movies
WHERE total_seats - available_seats = (
	SELECT MAX(total_seats - available_seats)
    FROM movies
);