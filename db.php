<?php
// ���������� �����������
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "first"; 

// ����������� � ������� ���� ������
$link = mysqli_connect($servername, $username, $password);

// �������� ����������
if (!$link) {
    die("Connection error: " . mysqli_connect_error());
}

// �������� ���� ������, ���� �� ����������
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    die("Failed to create a database: " . mysqli_error($link));
}

// �������� �������� ����������
mysqli_close($link);

// ����������� � ���� ������
$link = mysqli_connect($servername, $username, $password, $dbName);

// �������� ����������
if (!$link) {
    die("Database connection error: " . mysqli_connect_error());
}

// �������� ������� �������������, ���� �� ����������
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    die("The Users table could not be created: " . mysqli_error($link));
}

// �������� ������� ������, ���� �� ����������
$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    main_text TEXT NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    die("The Posts table could not be created: " . mysqli_error($link));
}

// �������� ����������
mysqli_close($link);
?>
