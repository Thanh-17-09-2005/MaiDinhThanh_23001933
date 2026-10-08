<?php

require_once "model/product.php";


// Kiểm tra ID
$id = $_GET["id"] ?? null;

if ($id === null || !is_numeric($id)) {
    die("ID sản phẩm không hợp lệ.");
}


// Lấy sản phẩm
$product = getProductById($id);

if ($product === null) {
    die("Không tìm thấy sản phẩm.");
}


$error = "";

$name = $product["name"];
$price = $product["price"];
$quantity = $product["quantity"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $price = $_POST["price"] ?? "";
    $quantity = $_POST["quantity"] ?? "";

    // Kiểm tra dữ liệu
    if ($name === "") {
        $error = "Tên sản phẩm không được rỗng.";
    } elseif (!is_numeric($price) || $price <= 0) {
        $error = "Giá sản phẩm phải lớn hơn 0.";
    } elseif (!is_numeric($quantity) || $quantity < 0) {
        $error = "Số lượng phải lớn hơn hoặc bằng 0.";
    } else {
        if (updateProduct($id, $name, $price, $quantity)) {
            header("Location: product_list.php");
            exit;
        } else {
            $error = "Cập nhật sản phẩm thất bại.";
        }
    }
}


require_once "view/header.php";

?>

<h2>Sửa sản phẩm</h2>

<?php if ($error !== ""): ?>
    <p class="error">
        <?php echo $error; ?>
    </p>
<?php endif; ?>


<form method="POST">
    <label>Tên sản phẩm:</label>
    <input
        type="text"
        name="name"
        value="<?php echo htmlspecialchars($name); ?>"
    >

    <label>Giá:</label>
    <input
        type="number"
        name="price"
        step="0.01"
        value="<?php echo htmlspecialchars($price); ?>"
    >

    <label>Số lượng:</label>
    <input
        type="number"
        name="quantity"
        min="0"
        value="<?php echo htmlspecialchars($quantity); ?>"
    >

    <br><br>

    <button type="submit">Cập nhật</button>

    <button><a href="product_list.php">Hủy</a></button>

</form>

<?php

require_once "view/footer.php";

?>