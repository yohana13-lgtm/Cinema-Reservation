<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require_once "../database/config.php";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM bookingtable WHERE bookingID = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid booking ID";
}
?>