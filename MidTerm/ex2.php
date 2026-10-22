<?php

$prices = [120, 250, 180, 500, 300];


// Hàm tính tổng tất cả các giá trị của sản phẩm
function calculateTotal($prices) {
    $total = 0;

    foreach ($prices as $price) {
        $total += $price;
    }

    return $total;
}

// Hàm trả về sản phẩm có giá cao nhất
function findMaxPrice($prices) {
    $max = $prices[0];

    foreach ($prices as $price) {
        if ($price > $max) {
            $max = $price;
        }
    }

    return $max;
}

$total = calculateAverage($prices);
$maxPrice = findMaxPrice($prices);

echo "<h2>Danh sách giá sản phẩm</h2>";

foreach ($prices as $index => $price) {
    echo "Sản phẩm " . ($index + 1) . ": ";
    echo number_format($price, 0, ',', '.') . " đồng<br>";
}

// Hiển thị tổng giá trị và giá cao nhất
echo "<br>";

echo "Tổng giá trị sản phẩm: " . number_format($total, 0, ',', '.') . " đồng<br>";
echo "Giá sản phẩm cao nhất: " . number_format($maxPrice, 0, ',', '.') . " đồng";

?>