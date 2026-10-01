CREATE TABLE cart_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

-- 1. Thêm ít nhất 5 sản phẩm
INSERT INTO cart_items (name, price, quantity)
VALUES
    ('Laptop Dell', 15000000, 2),
    ('Chuột Logitech', 500000, 6),
    ('Bàn phím cơ', 1200000, 3),
    ('Tai nghe Sony', 2500000, 7),
    ('USB 64GB', 180000, 10);

-- 2. Hiển thị toàn bộ sản phẩm
SELECT *
FROM cart_items;

-- 3. Hiển thị sản phẩm có giá lớn hơn 100000
SELECT *
FROM cart_items
WHERE price > 100000;

-- 4. Hiển thị sản phẩm có số lượng lớn hơn 5
SELECT *
FROM cart_items
WHERE quantity > 5;

-- 5. Sắp xếp sản phẩm theo giá giảm dần
SELECT *
FROM cart_items
ORDER BY price DESC;

-- 6. Cập nhật giá của một sản phẩm
UPDATE cart_items
SET price = 16000000
WHERE id = 1;

-- 7. Cập nhật số lượng của một sản phẩm
UPDATE cart_items
SET quantity = 5
WHERE id = 2;

-- 8. Xóa một sản phẩm
DELETE FROM cart_items
WHERE id = 5;

-- 9. Hiển thị tên, giá, số lượng và thành tiền
SELECT name, price, quantity, (price * quantity) AS total
FROM cart_items;

-- 10. Tính tổng tiền của toàn bộ giỏ hàng
SELECT SUM(price * quantity) AS total_cart
FROM cart_items;