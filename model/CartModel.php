<?php
include_once("dbConnect.php");
class CartModel extends Connect{
    public function getDetail($id){
        $sql = "select *
                from foods 
                where id = $id";
            $this->setQuery($sql);
            return $this->Load();
    }
}

?>