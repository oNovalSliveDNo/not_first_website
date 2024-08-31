<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        // Redirect if user is not logged in
        if (!isset($_COOKIE['User'])) {
            header("Location: login.php");
            exit();
        }

        // Greet the logged-in user
        $username = $_COOKIE['User'];
        echo "<h1 class='text-center'>Welcome, $username!</h1>";
        ?>

        <!-- Existing Profile Content -->
        <div class="container nav_bar">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">About Me</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <p>Hello! I am an aspiring web developer. This page is my first step into the world of website creation.</p>
                    <p>I enjoy programming and hope to become a professional in this fascinating field. In my free time, I like to explore new technologies, read books, and play sports.</p>
        
                    <h2>My Interests</h2>
                    <ul>
                        <li>Web Development</li>
                        <li>Programming</li>
                        <li>Cryptography</li>
                        <li>Playing Guitar</li>
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

        <!-- Post Creation Form -->
        <div class="container mt-5">
            <h2 class="text-center">Create a New Post</h2>
            <form method="POST" action="profile.php">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Content</label>
                    <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save Post</button>
            </form>
        </div>

        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>

<?php
// Include the database connection
require_once('db.php');

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    // Check if fields are not empty
    if (!$title || !$main_text) {
        die("Please fill out all fields!");
    }

    // Insert post data into the database
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    
    // Check if the query was successful
    if (!mysqli_query($link, $sql)) {
        die("Failed to add post");
    } else {
        echo "<script>alert('Post added successfully!');</script>";
    }
}

// Close the database connection
mysqli_close($link);
?>
