<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/databaseConnect.php";

// Hàm trả về JSON
function response($success, $message = "", $data = null, $status = 200) {
    http_response_code($status);

    $result = [
        "success" => $success
    ];

    if ($data !== null) {
        $result["data"] = $data;
    }

    if ($message !== "") {
        $result["message"] = $message;
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

// Đọc JSON từ request
function getInput() {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!is_array($input)) {
        response(false, "Dữ liệu JSON không hợp lệ", null, 400);
    }

    return $input;
}

// Kiểm tra dữ liệu
function validateProduct($input) {
    $name = trim($input["name"] ?? "");

    $price = $input["price"] ?? null;
    $stock = $input["stock"] ?? null;

    if (mb_strlen($name, "UTF-8") < 1 ||
        mb_strlen($name, "UTF-8") > 100) {
        response(false, "Tên sản phẩm phải từ 1 đến 100 ký tự", null, 400);
    }

    // Chấp nhận số nguyên hoặc chuỗi biểu diễn số nguyên
    if (
        !(is_int($price) ||
          (is_string($price) && preg_match('/^[0-9]+$/D', $price)))
        || (int)$price <= 0
    ) {
        response(false, "Đơn giá phải là số nguyên lớn hơn 0", null, 400);
    }

    if (
        !(is_int($stock) || (is_string($stock) && preg_match('/^[0-9]+$/D', $stock)))
        || (int)$stock < 0
    ) {
        response(false, "Số lượng tồn phải là số nguyên không âm", null, 400);
    }

    return [
        "name" => $name,
        "price" => (int)$price,
        "stock" => (int)$stock
    ];
}

$method = $_SERVER["REQUEST_METHOD"];

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

// GET: Lấy danh sách sản phẩm
if ($method === "GET") {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id ASC");

    $products = $stmt->fetchAll();

    response(true, "", $products);
}

// POST: Thêm sản phẩm
elseif ($method === "POST") {
    $input = getInput();
    $product = validateProduct($input);

    $sql = "INSERT INTO products (name, price, stock)
            VALUES (:name, :price, :stock)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute($product);

    response(true, "Thêm sản phẩm thành công", [
        "id" => (int)$pdo->lastInsertId()
    ], 201);
}

// PUT: Cập nhật sản phẩm
elseif ($method === "PUT") {
    if (!$id || $id <= 0) {
        response(false, "ID sản phẩm không hợp lệ", null, 400);
    }

    $input = getInput();
    $product = validateProduct($input);

    // Kiểm tra sản phẩm tồn tại
    $check = $pdo->prepare(
        "SELECT id FROM products WHERE id = :id"
    );

    $check->execute(["id" => $id]);

    if (!$check->fetch()) {
        response(false, "Không tìm thấy sản phẩm", null, 404);
    }

    $sql = "UPDATE products
            SET name = :name,
                price = :price,
                stock = :stock
            WHERE id = :id";

    $product["id"] = $id;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);

    response(true, "Cập nhật sản phẩm thành công");
}

// DELETE: Xóa sản phẩm
elseif ($method === "DELETE") {
    if (!$id || $id <= 0) {
        response(false, "ID sản phẩm không hợp lệ", null, 400);
    }

    $stmt = $pdo->prepare(
        "DELETE FROM products WHERE id = :id"
    );

    $stmt->execute(["id" => $id]);

    if ($stmt->rowCount() === 0) {
        response(false, "Không tìm thấy sản phẩm", null, 404);
    }

    response(true, "Xóa sản phẩm thành công");
}

// Phương thức không được hỗ trợ
else {
    header("Allow: GET, POST, PUT, DELETE");
    response(false, "Phương thức không được hỗ trợ", null, 405);
}

?>