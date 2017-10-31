<?php
    include_once("Cart.php");
    include_once("model/CartModel.php");
    session_start();
    class CartController {
        public function addToCart(){
            $id= $_POST['id'];
            $qty = ($_POST['soluong']<=0) ? 1 :  (int)$_POST['soluong'];

            $oldcart = null;
            $model = new CartModel();
            $item = $model->getDetail($id);
            if(isset($_SESSION['cart'])){
                $oldcart = $_SESSION['cart'];
            }

            $cart = new Cart($oldcart);
            $cart->add($item,$qty);
            $_SESSION['cart'] = $cart;
            
            echo "<pre>";
            print_r($cart);
            echo "</pre>";

            // echo $item->name;
        }
    }
?>