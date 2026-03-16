<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema_db";

$link = mysqli_connect($host, $user, $password, $dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}