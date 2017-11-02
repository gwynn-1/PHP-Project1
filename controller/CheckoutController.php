<?php
    
    include_once('controller.php');
    include_once('Cart.php');
    session_start();

    class CheckoutController extends controller{

        function getIndex(){
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
//            $cart = new Cart($cart);
//             session_destroy();
            return $this->loadView("for-checkout",$cart);
        }
    }
?>