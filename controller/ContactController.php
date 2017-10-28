<?php
    include_once('controller.php');
    class ContactController extends controller{
        function getIndex(){
            return $this->loadView("for-contact");    
        }
    }
?>