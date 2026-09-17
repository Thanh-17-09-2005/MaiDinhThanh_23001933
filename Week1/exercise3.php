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

// 1. Tìm sinh viên có điểm cao nhất
function findBestStudent($students) {
    $bestStudent = $students[0];

    foreach ($students as $student) {
        if ($student["score"] > $bestStudent["score"]) {
            $bestStudent = $student;
        }
    }

    return $bestStudent;
}

// 2. Tìm sinh viên có điểm thấp nhất
function findWorstStudent($students) {
    $worstStudent = $students[0];

    foreach ($students as $student) {
        if ($student["score"] < $worstStudent["score"]) {
            $worstStudent = $student;
        }
    }

    return $worstStudent;
}

// 3. Đếm số sinh viên đạt
function countPassedStudents($students) {
    $count = 0;

    foreach ($students as $student) {
        if ($student["score"] >= 5) {
            $count++;
        }
    }

    return $count;
}

// 4. Tìm sinh viên theo tên
function findStudentByName($students, $name) {
    foreach ($students as $student) {
        if ($student["name"] === $name) {
            return $student;
        }
    }

    return null;
}

// ================
// GỌI CÁC FUNCTION
// ================

// Sinh viên điểm cao nhất
$bestStudent = findBestStudent($students);

echo "<h3>Sinh viên có điểm cao nhất:</h3>";
echo "Họ tên: " . $bestStudent["name"] . "<br>";
echo "Tuổi: " . $bestStudent["age"] . "<br>";
echo "Điểm: " . $bestStudent["score"] . "<br>";


// Sinh viên điểm thấp nhất
$worstStudent = findWorstStudent($students);

echo "<h3>Sinh viên có điểm thấp nhất:</h3>";
echo "Họ tên: " . $worstStudent["name"] . "<br>";
echo "Tuổi: " . $worstStudent["age"] . "<br>";
echo "Điểm: " . $worstStudent["score"] . "<br>";


// Số sinh viên đạt
$passedStudents = countPassedStudents($students);

echo "<h3>Số sinh viên đạt:</h3>";
echo $passedStudents . " sinh viên<br>";


// Tìm sinh viên theo tên
$name = "Tran Thi Binh";

$student = findStudentByName($students, $name);

echo "<h3>Kết quả tìm kiếm:</h3>";

if ($student != null) {
    echo "Họ tên: " . $student["name"] . "<br>";
    echo "Tuổi: " . $student["age"] . "<br>";
    echo "Điểm: " . $student["score"] . "<br>";
} else {
    echo "Không tìm thấy sinh viên.";
}

?>
