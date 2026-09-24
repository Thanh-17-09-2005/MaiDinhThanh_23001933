<?php

require_once "Student.php";
require_once "student_functions.php";

$student1 = new Student("Nguyen Van An", 20, 8.5);
$student2 = new Student("Tran Thi Binh", 21, 6.5);
$student3 = new Student("Le Van Cuong", 19, 4.5);
$student4 = new Student("Pham Thi Dung", 20, 7.5);

$students = [
    $student1,
    $student2,
    $student3,
    $student4
];

// Hiển thị danh sách sinh viên
echo "<h2>Danh sách các sinh viên</h2>";

foreach ($students as $student) {
    $student->display();
}

// Tìm sinh viên có điểm cao nhất
$bestStudent = findBestStudent($students);

echo "<h2>Sinh viên có điểm cao nhất</h2>";

$bestStudent->display();

// Đếm số sinh viên đạt
$passedCount = countPassedStudents($students);

echo "<h2>Số sinh viên đạt</h2>";

echo $passedCount . " sinh viên<br>";

// Tính điểm trung bình
$averageScore = calculateAverage($students);

echo "<h2>Điểm trung bình của lớp</h2>";

echo $averageScore;

?>