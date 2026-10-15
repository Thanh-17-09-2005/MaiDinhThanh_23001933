CREATE DATABASE shopping_cart;

USE shopping_cart;

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO products (name, price, quantity) 
VALUES
    ('Laptop Dell', 15000000, 10),
    ('Chuột Logitech', 500000, 25),
    ('Bàn phím cơ', 1200000, 15),
    ('Tai nghe Bluetooth', 800000, 20),
    ('Màn hình Samsung', 4500000, 8),
    ('Điện thoại iPhone 15', 18000000, 12),
    ('Điện thoại Samsung Galaxy S24', 20000000, 10),
    ('Sạc nhanh Anker', 700000, 30),
    ('USB 64GB SanDisk', 250000, 40),
    ('Ổ cứng SSD Samsung 1TB', 2500000, 15),
    ('Webcam Logitech C920', 1800000, 10),
    ('Loa Bluetooth JBL', 1500000, 18),
    ('Balo laptop', 600000, 20),
    ('Bàn di chuột Logitech', 300000, 25),
    ('Đèn bàn LED', 450000, 15);

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);