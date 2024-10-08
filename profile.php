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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"></div>
            <div class="col-9 nav_text">
                <h1>
                    About me
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <p>Hello! I'm an aspiring web developer. This page is my first step into the world of website creation.</p>
                <p>I am passionate about programming and hope to become a professional in this exciting field. In my free time, I enjoy learning new technologies, reading books, and staying active.</p>
                <h2>My interests</h2>
                <ul>
                    <li>Web development</li>
                    <li>Programming</li>
                    <li>Cryptography</li>
                    <li>Playing the guitar</li>
                </ul>
            </div>
            <div class="col-4">
                <div class="row photo"></div>
                <div class="row"><p class="title_photo">Novoselov D.A.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Click me</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">Hello, <?php echo htmlspecialchars($_COOKIE['User']); ?></h1>
            </div>
            <div class="col-12">
                <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form" name="title" placeholder="Title">
                    <textarea name="text" cols="30" rows="10" placeholder="Input text"></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Save post</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
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

if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

?>
