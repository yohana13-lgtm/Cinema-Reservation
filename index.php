<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "database/config.php";
$sql = "SELECT * FROM movietable";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>LUX Cinema</title>
    <link rel="icon" type="image/png" href="img/logo.jpg">
</head>
<body>
<header></header>
<div id="home-section-1" class="movie-show-container">
    <h1>Currently Showing</h1>
    <h3>Book a movie now</h3>
    <div class="movies-container">
<?php
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while (($row = mysqli_fetch_assoc($result)) && $count < 6) {
            echo '<div class="movie-box">';
            echo '<img src="' . $row['movieImg'] . '" alt="">';
            echo '<div class="movie-info">';
            echo '<h3>' . $row['movieTitle'] . '</h3>';
            echo '<a href="booking.php?id=' . $row['movieID'] . '">
                    <i class="fas fa-ticket-alt"></i> Book a seat
                  </a>';
            echo '</div>';
            echo '</div>';
            $count++;
        }
    } else {
        echo '<h4 class="no-annot">No movies available</h4>';
    }
} else {
    echo "Query Error: " . mysqli_error($conn);
}
mysqli_free_result($result);
mysqli_close($conn);
?>
    </div>
</div>
<div id="home-section-2" class="services-section">
    <h1>How it works</h1>
    <h3>3 Simple steps to book your favourite movie!</h3>
    <div class="services-container">
        <div class="service-item">
            <div class="service-item-icon">
                <i class="fas fa-4x fa-video"></i>
            </div>
            <h2>1. Choose your favourite movie</h2>
            <p>choose the movie you want to watch at our theaters</p>
        </div>
        <div class="service-item">
            <div class="service-item-icon">
                <i class="fas fa-4x fa-credit-card"></i>
            </div>
            <h2>2. Pay for your tickets</h2>
            <p>choose the movie you want to watch at our theaters</p>
        </div>
        <div class="service-item">
            <div class="service-item-icon">
                <i class="fas fa-4x fa-theater-masks"></i>
            </div>
            <h2>3. Pick your seats & Enjoy watching</h2>
            <p>choose the movie you want to watch at our theaters</p>
        </div>
        <div class="service-item"></div>
        <div class="service-item"></div>
    </div>
</div>
<div id="home-section-3" class="trailers-section">
    <h1 class="section-title">Explore new movies</h1>
    <h3>Now showing</h3>
    <div class="trailers-grid">
        <div class="trailers-grid-item">
            <img src="img/movie thumb-1.jpg" alt="">
            <div class="trailer-item-info" data-video="AodpTeeyRB4">
                <h3>KKN Di Desa Penari</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
        <div class="trailers-grid-item">
            <img src="img/movie thumb-2.jpg" alt="">
            <div class="trailer-item-info" data-video="8wTYyVhLZmE">
                <h3>Dear Nathan : Thank You Salma</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
        <div class="trailers-grid-item">
            <img src="img/movie thumb-3.jpg" alt="">
            <div class="trailer-item-info" data-video="l-LD16Yzi2c">
                <h3>Uncharted</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
        <div class="trailers-grid-item">
            <img src="img/movie thumb-4.png" alt="">
            <div class="trailer-item-info" data-video="Y9dr2zw-TXQ">
                <h3>Fantastic Beasts: The Secrets of Dumbledore</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
        <div class="trailers-grid-item">
            <img src="img/movie thumb-5.jpeg" alt="">
            <div class="trailer-item-info" data-video="6DxjJzmYsXo">
                <h3>Minions The Rise Of Gru</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
        <div class="trailers-grid-item">
            <img src="img/movie thumb-6.jpg" alt="">
            <div class="trailer-item-info" data-video="bgrJaKR9w-A">
                <h3>Gara-Gara Warisan</h3>
                <i class="far fa-3x fa-play-circle"></i>
            </div>
        </div>
    </div>
</div>
<footer></footer>
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>