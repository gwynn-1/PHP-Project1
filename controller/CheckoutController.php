<?php
    include_once('controller.php');
    class CheckoutController extends controller{
        function getIndex(){
            return $this->loadView("for-checkout");    
        }
    }
?>