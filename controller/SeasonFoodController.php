<?php
    include_once('controller.php');
    class SeasonFoodController extends controller{
        function getIndex(){
            return $this->loadView("for-seasonfood");    
        }
    }
?>