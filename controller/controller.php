<?php
class Controller{
    protected function loadView($view,$data = []){
        include_once('view/layout.php');
    }

    protected function loadPagerTrangChu($data= []){
        include_once('view/ajax_phantrang_trangchu.php');
    }
}
?>