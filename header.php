<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php if(isset($title))
    { 
        echo $title;
    }else{ 
        echo "web dev"; 
    } 
    ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="header">
            <div id="top" class="container">
                <div id="logo">
                    <a href="/dev/"><img src="images/logo.png" alt="logo"></a>
                </div>
                <div id="toplink">
                <?php 
                if(isset($_SESSSION['user'])){ 
                    echo "user logged link";
                }else{
                    ?>
                        <a href="login.php">Login</a> | 
                        <a href="register.php">Signup</a>
                    <?php
                }
                ?>
                    
                </div>
                <div class="clear"></div>
            </div>
            <div id="nav">
                <div class="container">
                    <a href="/dev/" class="active">Home</a>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact Us</a>
                    <a href="services.php">Services</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>