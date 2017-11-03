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

            echo $item->name;
        }

        public function deleteCart(){
            $id= $_POST['id'];
            $oldcart = null;
            if(isset($_SESSION['cart'])){
                $oldcart = $_SESSION['cart'];
            }

            $cart = new Cart($oldcart);
            $cart->removeItem($id);
            $_SESSION['cart'] = $cart;
            if($cart->totalPrice == 0){
                unset($_SESSION['cart']);
                echo 0;
            }else
                echo number_format($cart->totalPrice);
        }

        public function UpdateCart(){
            $id= $_POST['id'];
            $qty = (int)$_POST['qty'];

            $model = new CartModel;
            $product = $model->getDetail($id);

            $oldcart = null;
            if(isset($_SESSION['cart'])){
                $oldcart = $_SESSION['cart'];
            }

            $cart = new Cart($oldcart);
            $cart->update($product,$id,$qty);
            $_SESSION['cart'] = $cart;

            echo json_encode([
                "dongiasanpham"=>$cart->items[$id]["price"],
                "tongtien"=>$cart->totalPrice
            ]);
        }
    }
?>