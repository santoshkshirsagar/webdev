<?php
class Reader extends User{
    public $myvar="My VAr";
    function shownew(){
        echo "<h2>NEw text from reader class".$this->var3."</h2>";
    }
}
