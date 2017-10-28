<?php
include_once('Controller.php');

class AboutController extends Controller{
    function getIndex(){
        return $this->loadView("about");    
    }
}
?>