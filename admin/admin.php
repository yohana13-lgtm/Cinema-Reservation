<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require_once "../database/config.php";
$sql = "SELECT * FROM bookingtable";
$bookingsNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookingtable"));
$messagesNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedbacktable"));
$moviesNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM movietable"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.jpg">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
    <div class="admin-section-header">
        <div class="admin-logo">
            LUX Cinema
        </div>
        <div class="admin-login-info">
            <i class="far fa-bell admin-notification-button"></i>
            <i class="far fa-comment-alt"></i>
            <a href="#">Welcome, Admin</a>
            <img class="admin-user-avatar" src="../img/avatar.png">
        </div>
    </div>
    <div class="admin-container">
        <div class="admin-section admin-section1">
            <ul>
                <li>
                    <i class="fas fa-sliders-h"></i>
                    <a href="admin.php">Dashboard</a>
                </li>
                <li>
                    <i class="fas fa-ticket-alt"></i>
                    <a href="#">Bookings</a>
                </li>
                <li>
                    <i class="fas fa-film"></i>
                    Movies
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-user"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-ticket-alt" style="background-color:#cf4545"></i>
                        <h2 style="color:#cf4545"><?php echo $bookingsNo ?></h2>
                        <h3>Bookings</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-film" style="background-color:#4547cf"></i>
                        <h2 style="color:#4547cf"><?php echo $moviesNo ?></h2>
                        <h3>Movies</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-envelope" style="background-color:#3cbb6c"></i>
                        <h2 style="color:#3cbb6c"><?php echo $messagesNo ?></h2>
                        <h3>Messages</h3>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color:#cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                    <div class='admin-panel-section-booking-item'>
                                    <div class='admin-panel-section-booking-response'>
                                    <a href='deleteBooking.php?id=" . $row['bookingID'] . "'>
                                    <i class='fas fa-times decline-booking'></i>
                                    </a>
                                    </div>
                                    <div class='admin-panel-section-booking-info'>
                                    <div>
                                    <h3>" . $row['movieName'] . "</h3>
                                    <i class='fas fa-circle'></i>
                                    <h4>" . $row['bookingTheatre'] . "</h4>
                                    <i class='fas fa-circle'></i>
                                    <h4>" . $row['bookingDate'] . "</h4>
                                    <i class='fas fa-circle'></i>
                                    <h4>" . $row['bookingTime'] . "</h4>
                                    </div>
                                    <div>
                                    <h4>" . $row['bookingFName'] . " " . $row['bookingLName'] . "</h4>
                                    <i class='fas fa-circle'></i>
                                    <h4>" . $row['bookingPNumber'] . "</h4>
                                    </div>
                                    </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "<h4>No bookings right now</h4>";
                        }
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Add Movie</h2>
                        <i class="fas fa-film" style="background-color:#4547cf"></i>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <input placeholder="Title" type="text" name="movieTitle" required>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="Director" type="text" name="movieDirector" required>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <input type="file" name="movieImg" accept="image/*" required>
                        <button type="submit" name="submit" class="form-btn">Add Movie</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $title = mysqli_real_escape_string($conn, $_POST['movieTitle']);
                            $genre = mysqli_real_escape_string($conn, $_POST['movieGenre']);
                            $duration = $_POST['movieDuration'];
                            $date = $_POST['movieRelDate'];
                            $director = mysqli_real_escape_string($conn, $_POST['movieDirector']);
                            $actors = mysqli_real_escape_string($conn, $_POST['movieActors']);
                            $imageName = $_FILES['movieImg']['name'];
                            $tmpName = $_FILES['movieImg']['tmp_name'];
                            $path = "../img/" . $imageName;
                            move_uploaded_file($tmpName, $path);
                            $query = "INSERT INTO movietable
                            (movieImg,movieTitle,movieGenre,movieDuration,movieRelDate,movieDirector,movieActors)
                            VALUES
                            ('img/$imageName','$title','$genre','$duration','$date','$director','$actors')";
                            mysqli_query($conn, $query);
                            echo "<script>alert('Movie Added Successfully');</script>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/jquery-3.3.1.min.js"></script>
    <script src="../scripts/script.js"></script>
</body>
</html>