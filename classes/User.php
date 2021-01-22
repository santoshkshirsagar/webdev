<?php
class User{
    public $var1 = "test";
    
    private $varp ="im public";
    public $var2 ="im public";
    protected $var3 ="<b>im protected</b>";

    public function showme(){
        echo "<h1>this is from class sfdasd".$this->varp."</h1>";
    }
    public static function showstatic(){
        echo "<h1>Static statement</h1>";
    }
}