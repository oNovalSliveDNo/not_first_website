<?php

$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbname = "first";

$link = mysqli_connect($servername, $username, $password);
if (!$link) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create database: " . mysqli_error($link);
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create the 'users' table: " . mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create the 'posts' table: " . mysqli_error($link);
}

mysqli_close($link);
?>
