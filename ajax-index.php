<?php
    include_once("./controller/HomeController.php");
    $home_ajax_c = new HomeController();
    $home_ajax_c->getIndexForAjax();
?>