<?php
$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');
$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=$id";

$res = mysqli_query($link, $sql);

$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novoselov D.A.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    echo "<h1>$title</h1>";
    echo "<p>$main_text</p>";
    ?>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    
    if (!$title || !$main_text) die("Please fill out all fields");
    
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    
    if (!mysqli_query($link, $sql)) die("Failed to add post: " . mysqli_error($link));

    echo "Post added successfully!";
}
?>
