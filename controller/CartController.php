<?php
    include_once("Cart.php");
    include_once("model/CartModel.php");
    session_start();
    class CartController {
        public function addToCart(){
            $id= $_POST['id'];
            $oldcart = null;
            $model = new CartModel();
            $item = $model->getDetail($id);
            if(isset($_SESSION['cart'])){
                $oldcart = $_SESSION['cart'];
            }

            $cart = new Cart($oldcart);
            $cart->add($item,$qty =1 );
            $_SESSION['cart'] = $cart;
            print_r($cart);
        }
    }
?>