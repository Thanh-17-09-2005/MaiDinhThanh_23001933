<?php

require_once "Movie.php";

// Tìm phim theo ID
function findMovieById(array $movies, $id): ?Movie {
    if (empty($movies)) {
        return null;
    }

    foreach ($movies as $movie) {
        if ($movie->getId() === $id) {
            return $movie;
        }
    }

    return null;
}

// Tính tổng doanh thu của tất cả các phim trong danh sách
function getTotalRevenue(array $moives): float {
    if (empty($moives)) {
        return 0;
    }

    $totalRevenue = 0;

    foreach ($moives as $moive) {
        $totalRevenue += $moive->getRevenue();
    }

    return $totalRevenue;
}

// Tìm phim có số vé bán nhiều nhất
function getBestSellingMovie(array $movies): ?Movie {
    if (empty($movies)) {
        return null;
    }

    $bestMovie = $movies[0];

    foreach ($movies as $movie) {
        if ($movie->getSoldSeats() > $bestMovie->getSoldSeats()) {
            $bestMovie = $movie;
        }
    }

    return $bestMovie;
}

?>