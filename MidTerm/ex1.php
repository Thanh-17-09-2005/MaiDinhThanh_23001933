<?php

$name = "Mai Đình Thành";
$score = 8.5;

if ($score >= 8) {
    $rank = "Giỏi";
} else if ($score >= 6.5) {
    $rank = "Khá";
} else if ($score >= 5) {
    $rank = "Trung Bình";
} else {
    $rank = "Yếu";
}

echo "<h2>Kết quả xếp loại học sinh</h2>";
echo "Họ và tên: " . $name . "<br>";
echo "Điểm: " . $score . "<br>";
echo "Xếp loại: " . $$rank;

?>