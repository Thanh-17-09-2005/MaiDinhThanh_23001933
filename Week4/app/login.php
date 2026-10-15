
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "common/dbConnect.php";

if (isset($_SESSION["user_id"])) {
    header("Location: product_list.php");
    exit;
}

$error = "";

if (isset($_GET["registered"])) {
    $success = "Đăng ký thành công! Hãy đăng nhập.";
} else {
    $success = "";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "" || $password === "") {
        $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
    } else {
        // Tìm tài khoản theo username
        $sql = "SELECT id, username, password
                FROM users
                WHERE username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Kiểm tra tài khoản và mật khẩu
        if ($user && password_verify($password, $user["password"])) {
            // Tạo session đăng nhập
            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: product_list.php");
            exit;
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu không chính xác.";
        }

        $stmt->close();
    }
}
?>

<?php require_once "view/header.php"; ?>

<h2>Đăng nhập</h2>

<?php if ($success !== ""): ?>
    <p class="success">
        <?php echo htmlspecialchars($success); ?>
    </p>
<?php endif; ?>

<?php if ($error !== ""): ?>
    <p class="error">
        <?php echo htmlspecialchars($error); ?>
    </p>
<?php endif; ?>

<form method="POST" action="login.php">

    <label>Tên đăng nhập:</label>
    <input 
        style="margin-top: 5px; margin-bottom: 5px"
        type="text"
        name="username"
        maxlength="50"
        required
    >

    <label>Mật khẩu:</label>
    <input 
        style="margin-top: 5px"
        type="password"
        name="password"
        required
    >

    <button type="submit" style="margin-top: 10px">Đăng nhập</button>

</form>

<p>
    Chưa có tài khoản?
    <a href="register.php">Đăng ký ngay</a>
</p>

<?php require_once "view/footer.php"; ?>
