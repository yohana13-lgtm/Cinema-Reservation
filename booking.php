<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "database/config.php";
$id = intval($_GET['id']);
$movieQuery = "SELECT * FROM movietable WHERE movieID = $id";
$movieImageById = mysqli_query($conn, $movieQuery);
$row = mysqli_fetch_assoc($movieImageById);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Book <?php echo $row['movieTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.jpg">
</head>
<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <img src="<?php echo $row['movieImg']; ?>" alt="">
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENRE</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>DIRECTOR</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>ACTORS</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form method="POST">
                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>
                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                        <option value="7d">7D</option>
                    </select>
                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">June 12,2022</option>
                        <option value="13-3">June 13,2022</option>
                        <option value="14-3">June 14,2022</option>
                        <option value="15-3">June 15,2022</option>
                        <option value="16-3">June 16,2022</option>
                    </select>
                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>
                    <input placeholder="First Name" type="text" name="fName" required>
                    <input placeholder="Last Name" type="text" name="lName">
                    <input placeholder="Phone Number" type="text" name="pNumber" required>
                    <button type="submit" name="submit" class="form-btn">Book a Seat</button>
                    <?php
                    if (isset($_POST['submit'])) {
                        $fName = mysqli_real_escape_string($conn, $_POST['fName']);
                        $lName = mysqli_real_escape_string($conn, $_POST['lName']);
                        $pNumber = mysqli_real_escape_string($conn, $_POST['pNumber']);
                        $theatre = $_POST['theatre'];
                        $type = $_POST['type'];
                        $date = $_POST['date'];
                        $hour = $_POST['hour'];
                        $insert_query = "INSERT INTO bookingtable
                            (
                            movieName,
                            bookingTheatre,
                            bookingType,
                            bookingDate,
                            bookingTime,
                            bookingFName,
                            bookingLName,
                            bookingPNumber
                            )
                            VALUES
                            (
                            '" . $row['movieTitle'] . "',
                            '$theatre',
                            '$type',
                            '$date',
                            '$hour',
                            '$fName',
                            '$lName',
                            '$pNumber'
                            )";
                        if (mysqli_query($conn, $insert_query)) {
                            echo "<script>alert('Booking Successful');</script>";
                        } else {
                            echo "Error : " . mysqli_error($conn);
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>