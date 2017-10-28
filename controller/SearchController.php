<?php
    include_once('controller.php');
    class SearchController extends controller{
        function getIndex(){
            return $this->loadView("for-search");    
        }
    }
?>