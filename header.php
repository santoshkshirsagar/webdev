<?php 
include('inc/constants.php');
include('inc/common.php');
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
    <style>
    body{font-family: 'Lato', sans-serif;}
    </style>

</head>
<body>
    <header>
        <div id="header">
            <!-- 
                <div id="top" class="container">
                <div id="logo">
                    <a href="/dev/"><img src="images/logo.png" alt="logo"></a>
                </div>
                <div id="toplink">
                
                    
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
            </div> -->

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo BASEURL; ?>">ResumeBuilder</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo BASEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL; ?>about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL; ?>contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASEURL; ?>services">Services</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php 
                if(isset($_SESSION['user'])){ 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="account">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register">Signup</a>
                    </li>
                    <?php
                }
                ?>
                    
                </ul>


                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                </div>
            </div>
            </nav>




        </div>
    </header>
    <?php
    function showText(){
        echo "<h1>Test Heading</h1>";
        echo "message";
    }
    ?>