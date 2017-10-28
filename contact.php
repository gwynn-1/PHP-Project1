<?php
include_once("./controller/ContactController.php");
$home_c = new ContactController();
$home_c->getIndex();
?>