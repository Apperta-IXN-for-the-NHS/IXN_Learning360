<?php
include_once "./config/config.php";

if(!isset($_SESSION['admin_name'])){
    die('<script>window.location="./login.html";</script>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container .main .center iframe{
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top">
            <div class="user">
                <img src="images/user.png" alt="">
                <span><?=$_SESSION['admin_name']?></span>
                <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log out</a>
            </div>
            <div class="logo">
                Video Background Management
            </div>
        </div>
        <div class="main">
            <div class="left">
                <h2>MENU</h2>
                <h4>PASSWORD</h4>
                <ul>
                    <li><a href="admin_pwd.php" target="toMain">reset password</a></li>
                </ul>
                <h4>Video</h4>
                <ul>
                    <li><a href="video.php" target="toMain">Video List</a></li>
                    <li><a href="video_add.php" target="toMain">Add Video</a></li>
                </ul>
            </div>
            <div class="center">
                <iframe src="video.php" name="toMain">Your browser is too old to support this</iframe>
            </div>
        </div>
    </div>
</body>
</html>
