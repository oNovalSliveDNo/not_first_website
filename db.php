<?php
// Define the connection variables
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "first";

// Connect to MySQL server
$link = mysqli_connect($servername, $username, $password);

// Check for connection errors
if (!$link) {
    die("Connection error: " . mysqli_connect_error());
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create database: " . mysqli_error($link);
}

// Close the initial connection
mysqli_close($link);

// Connect to the newly created database
$link = mysqli_connect($servername, $username, $password, $dbName);

// SQL query to create the 'users' table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create the 'users' table: " . mysqli_error($link);
}

// SQL query to create the 'posts' table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create the 'posts' table: " . mysqli_error($link);
}

// Close the connection to the database
mysqli_close($link);
?>
