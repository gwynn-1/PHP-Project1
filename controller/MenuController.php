<?php
include_once('Controller.php');

class MenuController extends Controller{
    function getIndex(){
        return $this->loadView("ds-thuc-don");    
    }
}
?>