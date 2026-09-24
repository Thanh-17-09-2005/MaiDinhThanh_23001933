<?php

require_once "Movie.php";
require_once "movie_functions.php";

try {
    // 1. Tạo danh sách các object Moive
    $movies = [
        new Movie(1, "Avengers", 100000, 100),
        new Movie(2, "Avatar", 120000, 80),
        new Movie(3, "Batman", 90000, 120)
    ];

    // 2. Đặt vé cho phim Avengers
    $avengers = findMovieById($movies, 1);

    if ($avengers !== null) {
        $avengers->bookTicket(30);
    }

    // 3. Đặt vé cho phim Avatar
    $avatar = findMovieById($movies, 2);

    if ($avatar !== null) {
        $avatar->bookTicket(20);
    }

    // 4. Hủy một số vé của Avengers
    echo "<br>";

    $avengers->cancelTicket(5);

    // 5. Hiển thị thông tin của tất cả các phim
    echo "<br>";
    echo "<h2>DANH SÁCH PHIM</h2>";

    /*
    foreach ($movies as $movie) {
        $movie->displayInfo();
        echo "<br>";
    } 
    */
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    
    echo "<tr>";
    echo "<th>Mã phim</th>";
    echo "<th>Tên phim</th>";
    echo "<th>Giá vé</th>";
    echo "<th>Tổng số ghế</th>";
    echo "<th>Số ghế còn lại</th>";
    echo "<th>Vé đã bán</th>";
    echo "<th>Doanh thu</th>";
    echo "</tr>";

    foreach ($movies as $movie) {
        echo "<tr>";

        echo "<td style='text-align: center'>" . $movie->getId() . "</td>";
        echo "<td>" . $movie->getTitle() . "</td>";
        echo "<td style='text-align: right'>" . number_format($movie->getPrice()) . " VNĐ</td>";
        echo "<td style='text-align: center'>" . $movie->getTotalSeats() . "</td>";
        echo "<td style='text-align: center'>" . $movie->getAvailableSeats() . "</td>";
        echo "<td style='text-align: center'>" . $movie->getSoldSeats() . "</td>";
        echo "<td style='text-align: right'>" . number_format($movie->getRevenue()) . " VNĐ</td>";

        echo "</tr>";
    }

    echo "</table>";

    // 6. Tính tổng doanh thu
    $totalRevenue = getTotalRevenue($movies);

    echo "<h2>TỔNG DOANH THU</h2>";

    echo number_format($totalRevenue) . " VNĐ";

    // 7. Tìm phim bán được nhiều vé nhất
    echo "<h2>PHIM BÁN ĐƯỢC NHIỀU VÉ NHẤT</h2>";

    $bestMovie = getBestSellingMovie($movies);

    if ($bestMovie !== null) {
        echo "Tên phim: " . $bestMovie->getTitle() . "<br>";
        echo "Số vé đã bán: " . $bestMovie->getSoldSeats() . " vé<br>";
        echo "Doanh thu: " . number_format($bestMovie->getRevenue()) . " VNĐ";
    }

    // 8. Các trường hợp lỗi
    echo "<hr>";
    echo "<h2>KIỂM TRA CÁC TRƯỜNG HỢP LỖI</h2>";

    $avengers->bookTicket(0); // Đặt số vé <= 0

    $avengers->bookTicket(1000); // Đặt vượt quá số ghế còn lại

    $avengers->cancelTicket(0); // Hủy số vé <= 0

    $avengers->cancelTicket(1000); // Hủy nhiều hơn số vé đã bán

    $notFoundMovie = findMovieById($movies, 999); // Tìm phim không tồn tại

    if ($notFoundMovie === null) {
        echo "Không tìm thấy phim có ID = 999.<br>";
    }

    $emptyMovies = []; // Kiểm tra danh sách phim rỗng

    echo "Tổng doanh thu danh sách rỗng: " . getTotalRevenue($emptyMovies) . " VNĐ<br>";

    $emptyBestMovie = getBestSellingMovie($emptyMovies);

    if ($emptyBestMovie === null) {
        echo "Danh sách phim rỗng, không có phim bán chạy nhất.<br>";
    }
} catch (InvalidArgumentException $e) {
    echo "Lỗi: " . $e->getMessage();
}

?>