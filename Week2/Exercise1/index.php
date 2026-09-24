<?php

require_once "CartItem.php";
require_once "ShoppingCart.php";

$cart = new ShoppingCart();

try {
    // Tạo sản phẩm
    $item1 = new CartItem("Coca Cola", 10000, 2);
    $item2 = new CartItem("Pepsi", 10000, 3);
    $item3 = new CartItem("Sting", 12000, 2);
    $item4 = new CartItem("Aquafina", 8000, 4);

    // Thêm sản phẩm vào giỏ hàng
    $cart->addItem($item1);
    $cart->addItem($item2);
    $cart->addItem($item3);
    $cart->addItem($item4);

    echo "<hr>";

    // Hiển thị giỏ hàng
    $cart->displayCart();

    echo "<hr>";

    // Xóa một sản phẩm
    $cart->removeItem("Pepsi");

    echo "<hr>";

    // Hiển thị lại giỏ hàng sau khi xóa
    $cart->displayCart();
} catch (InvalidArgumentException $e) {
    echo "Lỗi: " . $e->getMessage();
}

?>