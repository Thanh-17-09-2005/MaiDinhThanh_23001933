<?php

require_once "Student.php";

// Tìm sinh viên có điểm cao nhất
function findBestStudent(array $students) : Student {
    $bestStudent = $students[0];

    foreach ($students as $student) {
        if ($student->getScore() > $bestStudent->getScore()) {
            $bestStudent = $student;
        }
    }

    return $bestStudent;
}

// Đếm số sinh viên đạt
function countPassedStudents(array $students) : int {
    $count = 0;

    foreach ($students as $student) {
        if ($student->isPassed()) {
            $count++;
        }
    }

    return $count;
}

// Tính điểm trung bình
function calculateAverage(array $students) : float {
    $totalScore = 0;

    foreach ($students as $student) {
        $totalScore += $student->getScore();
    }

    return $totalScore / count($students);
}

?>