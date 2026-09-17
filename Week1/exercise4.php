<?php

require_once "Student.php";

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

foreach ($students as $student) {
    $student->display();
}

?>