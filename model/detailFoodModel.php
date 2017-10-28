<?php
include_once("dbConnect.php");
class DetailFoodModel extends Connect{
    public function getDetail($alias,$id){
        $sql = "select f.*
                from foods f inner join pageurl p 
                On f.id_url = p.id 
                where p.url = '$alias' and f.id = $id";

        
            $this->setQuery($sql);
            return $this->Load();
    }

    public function getFoodByType($id_foods){
        $sql= "Select f.*,p.url from foods f join pageurl p on f.id_url = p.id 
                where id_type = (Select id_type from foods where id = $id_foods)
                And f.id <> $id_foods
                ORDER BY update_at DESC Limit 0,20";
        $this->setQuery($sql);
        return $this->LoadAll();
    }
}
?>