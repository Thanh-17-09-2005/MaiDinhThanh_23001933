<?php

class Student {
    private string $name;
    private int $age;
    private float $score;

    public function __construct(string $name, int $age, float $score) {
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    } 

    public function getRank(): string {
        if ($this->score >= 8) {
            return "Giỏi";
        } elseif ($this->score >= 6.5) {
            return "Khá";
        } elseif ($this->score >= 5) {
            return "Trung bình";
        } else {
            return "Yếu";
        }
    }

    public function isPassed(): bool {
        return $this->score >= 5;
    }

    public function display(): void {
        echo "Họ tên: " . $this->name . "<br>";
        echo "Tuổi: " . $this->age . "<br>";
        echo "Điểm: " . $this->score . "<br>";
        echo "Xếp loại: " . $this->getRank() . "<br>";
        echo "-------------------------<br>";

        if ($this->isPassed()) {
            echo "Kết quả: Đạt<br>";
        } else {
            echo "Kết quả: Không đạt<br>";
        }

        echo "-------------------------<br>";
    }

    public function getScore(): float {
        return $this->score;
    }
}

?>