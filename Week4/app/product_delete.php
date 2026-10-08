<?php

require_once "model/product.php";


$id = $_GET["id"] ?? null;


// Kiểm tra ID
if ($id === null || !is_numeric($id)) {
    die("ID sản phẩm không hợp lệ.");
}


// Kiểm tra sản phẩm có tồn tại không
$product = getProductById($id);

if ($product === null) {
    require_once "view/header.php";

    echo "<p class='error'>Sản phẩm không tồn tại.</p>";
    echo '<a href="product_list.php">Quay lại danh sách</a>';

    require_once "view/footer.php";

    exit;
}


// Thực hiện xóa
if (deleteProduct($id)) {
    header("Location: product_list.php");
    exit;
} else {
    require_once "view/header.php";

    echo "<p class='error'>Xóa sản phẩm thất bại.</p>";
    echo '<a href="product_list.php">Quay lại danh sách</a>';

    require_once "view/footer.php";
}

?>