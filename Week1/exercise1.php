<?php

$students = [
    [
        "name" => "Nguyen Van An",
        "age" => 20,
        "score" => 8.5
    ],
    [
        "name" => "Tran Thi Binh",
        "age" => 21,
        "score" => 6.5
    ],
    [
        "name" => "Le Van Cuong",
        "age" => 19,
        "score" => 4.5
    ],
    [
        "name" => "Pham Thi Dung",
        "age" => 20,
        "score" => 7.5
    ]
];

// Biến dùng để tính tổng điểm
$totalScore = 0;

// Duyệt danh sách sinh viên bằng foreach
foreach ($students as $student) {
    echo "Họ tên: " . $student["name"] . "<br>";
    echo "Tuổi: " . $student["age"] . "<br>";
    echo "Điểm: " . $student["score"] . "<br>";
    echo "-------------------------<br>";

    // Cộng điểm vào tổng
    $totalScore += $student["score"];
}

// Tính điểm trung bình
$averageScore = $totalScore / count($students);

// In điểm trung bình
echo "<strong>Điểm trung bình của lớp: " . $averageScore . "</strong><br>";

?>