<?php

spl_autoload_register(function($className){

    if(!file_exists(('classes/'.$className.'.php'))){
        echo "Class not found";
        exit();
    }
    include('classes/'.$className.'.php');

});

$obj = new Reader();
echo $obj->var2;
$obj->showme();