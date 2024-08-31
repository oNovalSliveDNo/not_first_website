<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Novoselov D.A.</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        if (!isset($_COOKIE['User'])) {
            header("Location: index.php");
            exit();
        }
        ?>
        
        <!-- All content from index.html -->
        <div class="container nav_bar">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">About me</div>
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
        
        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>
