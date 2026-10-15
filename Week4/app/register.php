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
$success = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Kiểm tra dữ liệu rỗng
    if ($username === "" || trim($password) === "") {
        $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
    } elseif (strlen($username) > 50) {
        $error = "Tên đăng nhập không được vượt quá 50 ký tự.";
    } else {
        // Kiểm tra username đã tồn tại
        $sql = "SELECT id FROM users WHERE username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Tên đăng nhập đã tồn tại.";
        } else {
            // Băm mật khẩu
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Thêm tài khoản
            $sql = "INSERT INTO users (username, password)
                    VALUES (?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "ss",
                $username,
                $hashedPassword
            );

            if ($stmt->execute()) {
                header("Location: login.php?registered=1");
                exit;
            } else {
                $error = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        }

        $stmt->close();
    }
}
?>

<?php require_once "view/header.php"; ?>

<h2>Đăng ký tài khoản</h2>

<?php if ($error !== ""): ?>
    <p class="error">
        <?php echo htmlspecialchars($error); ?>
    </p>
<?php endif; ?>

<form method="POST" action="register.php">

    <label>Tên đăng nhập:</label>
    <input
        style="margin-top: 5px; margin-bottom: 5px"
        type="text"
        name="username"
        maxlength="50"
        required
        value="<?php echo htmlspecialchars($username); ?>"
    >

    <label>Mật khẩu:</label>
    <input
        style="margin-top: 5px"
        type="password"
        name="password"
        required
    >

    <button type="submit" style="margin-top: 10px">Đăng ký</button>

</form>

<p>
    Đã có tài khoản?
    <a href="login.php">Đăng nhập</a>
</p>

<?php require_once "view/footer.php"; ?>
