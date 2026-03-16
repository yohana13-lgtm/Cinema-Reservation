<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "database/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="img/logo.jpg">
</head>
<body>
    <header></header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contact</h1>
            <p>Contact us here</p>
            <form method="POST">
                <input placeholder="First Name" name="fName" required><br>
                <input placeholder="Last Name" name="lName"><br>
                <input placeholder="E-mail Address" name="eMail" required><br>
                <textarea placeholder="Enter your message!" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit">Send your Message</button>
                <?php
                if (isset($_POST['submit'])) {
                    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
                    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
                    $email = mysqli_real_escape_string($conn, $_POST['eMail']);
                    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
                    $insert_query = "INSERT INTO feedbacktable
(
senderfName,
senderlName,
sendereMail,
senderfeedback
)
VALUES
(
'$fName',
'$lName',
'$email',
'$feedback'
)";
                    if (mysqli_query($conn, $insert_query)) {
                        echo "<script>alert('Message Sent Successfully');</script>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
                ?>
            </form>
        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Address & Info</h1>
            <h3>Phone Numbers</h3>
            <p>
                <a href="tel:081266420424">+62 81266420424</a><br>
                <a href="tel:082276364013">+62 82276364013</a>
            </p>
            <h3>Address</h3>
            <p>
                Yogyakarta, Kabupaten Sleman, Kecamatan Depok,
                Jln. Dirgantara No.23
            </p>
            <h3>E-mail</h3>
            <p>
                <a href="mailto:yohanasihite13@gmail.com">
                    yohanasihite13@gmail.com
                </a>
            </p>
        </div>
    </div>
    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/owl.carousel.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>