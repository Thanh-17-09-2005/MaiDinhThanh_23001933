<?php

require_once __DIR__ .  "/../common/dbConnect.php";

$username = "admin";
$plainPassword = "admin123";

// Băm mật khẩu trước khi lưu
$hashedPassword = password_hash(
    $plainPassword,
    PASSWORD_DEFAULT
);

$sql = "INSERT INTO users (username, password)
        VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo "Tạo tài khoản mẫu thành công!";
    echo "<br>Tên đăng nhập: admin";
    echo "<br>Mật khẩu: admin123";
} else {
    echo "Không thể tạo tài khoản. Có thể username đã tồn tại.";
}

$stmt->close();

?>