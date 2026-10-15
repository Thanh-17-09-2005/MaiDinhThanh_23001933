<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giỏ hàng</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>QUẢN LÝ GIỎ HÀNG</h1>
    
    <?php if (isset($_SESSION["user_id"])): ?>
        <p>
            Xin chào,
            <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>
            |
            <a href="logout.php">Đăng xuất</a>
        </p>
        <nav>
            <a href="product_list.php">Danh sách sản phẩm</a> |
            <a href="product_add.php">Thêm sản phẩm</a>
        </nav>
    <?php endif; ?>

<hr>