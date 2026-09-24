<?php

require_once "CartItem.php";

class ShoppingCart {
    private array $items = [];

    public function addItem($item): void {
        if (!$item instanceof CartItem) {
            echo "Lỗi: Chỉ được thêm object CartItem vào giỏ hàng.<br>";
            return;
        }

        $this->items[] = $item;

        echo "Đã thêm sản phẩm: " . $item->getName() . "<br>";
    }

    public function removeItem($name): void {
        foreach ($this->items as $index => $item) {
            if ($item->getName() == $name) {
                unset($this->items[$index]);

                // Đặt lại chỉ số mảng
                $this->items = array_values($this->items);

                echo "Đã xóa sản phẩm: $name<br>";
                return;
            }
        }

        echo "Không tìm thấy sản phẩm: $name<br>";
    }

    public function calculateTotal(): float {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }

    public function displayCart(): void {
        if (empty($this->items)) {
            echo "<p>Giỏ hàng đang trống.</p>";
            return;
        }

        echo "<h2?>Danh sách giỏ hàng</h2>";

        echo "<table border='1' cellpadding='8' cellspacing='0'>";

        echo "<tr>";
        echo "<th>Tên sản phẩm</th>";
        echo "<th>Đơn giá</th>";
        echo "<th>Số lượng</th>";
        echo "<th>Thành tiền</th>";
        echo "</tr>";

        foreach ($this->items as $item) {
            echo "<tr>";
            echo "<td>" . $item->getName() . "</td>";
            echo "<td>" . $item->getPrice() . " VNĐ</td>";
            echo "<td><center>" . $item->getQuantity() . "</center></td>";
            echo "<td>" . number_format($item->getTotal()) . " VNĐ</td>";
            echo "</tr>";
        }

        echo "</table>";

        echo "<p><strong>Tổng tiền: "
            . number_format($this->calculateTotal())
            . " VNĐ</strong></p>";
    }
}

?>