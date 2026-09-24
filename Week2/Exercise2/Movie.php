<?php

class Movie {
    private int $id;
    private string $title;
    private float $price;
    private int $totalSeats;
    private int $availableSeats;

    public function __construct($id, $title, $price, $totalSeats) {
        if ($price <= 0) {
            throw new InvalidArgumentException("Giá vé phải lớn hơn 0.");
        }

        if ($totalSeats <= 0) {
            throw new InvalidArgumentException("Tổng số ghế phải lớn 0.");
        }

        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->totalSeats = $totalSeats;
        $this->availableSeats = $totalSeats;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getTotalSeats(): int {
        return $this->totalSeats;
    }

    public function getAvailableSeats(): int {
        return $this->availableSeats;
    }

    // Đặt vé
    public function bookTicket($quantity): void {
        if ($quantity <= 0) {
            echo "<em>Lỗi</em>: Số vé đặt phải lớn hơn 0.<br>";
            return;
        }

        if ($quantity > $this->availableSeats) {
            echo "<em>Lỗi</em>: Không đủ ghế để đặt vé cho phim " . $this->title . ".<br>";
            return;
        }

        $this->availableSeats -= $quantity;

        echo "Đặt thành công $quantity vé cho phim " . $this->title . ".<br>";
    }

    // Hủy vé
    public function cancelTicket($quantity): void {
        if ($quantity <= 0) {
            echo "<em>Lỗi</em>: Số vé hủy phải lớn hơn 0.<br>";
            return;
        }

        if ($quantity > $this->getSoldSeats()) {
            echo "<em>Lỗi</em>: Không thể hủy $quantity vé vì số vé đã bán chỉ là " . $this->getSoldSeats() . ".<br>";
            return;
        }

        $this->availableSeats += $quantity;

        echo "Đã hủy $quantity vé của phim " . $this->title . ".<br>";
    }

    // Lấy số vé đã bán
    public function getSoldSeats(): int {
        return $this->totalSeats - $this->availableSeats;
    }

    // Tính doanh thu
    public function getRevenue(): float {
        return $this->getSoldSeats() * $this->price;
    }

    public function displayInfo(): void {
        echo "<h3>Thông tin phim</h3>";

        echo "Mã phim: " . $this->id . "<br>";
        echo "Tên phim: " . $this->title . "<br>";
        echo "Giá vé: " . $this->price . "<br>";
        echo "Tổng số ghế: " . $this->totalSeats . "<br>";
        echo "Số ghế còn lại: " . $this->availableSeats . "<br>";
        echo "Số vé đã bán: " . $this->getSoldSeats() . "<br>";
        echo "Doanh thu: " . number_format($this->getRevenue()) . " VNĐ<br>";
    }
}

?>