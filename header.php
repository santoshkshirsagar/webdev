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
                if(isset($_SESSION['user'])){ 
                    echo "<a href='account.php'>My Account</a>";
                    echo " | <a href='logout.php'>Logout</a>";
                }else{
                    ?>
                        <a class="btn-top" href="login.php">Login</a>
                        <a class="btn-top" href="register.php">Signup</a>
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
    <?php
    function showText(){
        echo "<h1>Test Heading</h1>";
        echo "message";
    }
    ?>