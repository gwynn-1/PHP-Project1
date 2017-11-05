<?php
    
    session_start();
    // include_once("Cart.php");
    include_once('controller.php');
    require_once("./autoload.php");

    class CheckoutController extends controller{

        function getIndex(){
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
           $cart = new Cart($cart);
//             session_destroy();
            return $this->loadView("for-checkout",$cart);
        }
    }
?>