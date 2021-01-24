<?php
spl_autoload_register(function($className){
    if(!file_exists(('classes/'.$className.'.php'))){
        echo "Class not found";
        exit();
    }
    include('classes/'.$className.'.php');
});


    $servername = "localhost";      
    $username = "santosh";
    $password = "password";
    $dbname = "santosh_web";

    $db = new MysqliDb($servername, $username, $password, $dbname);