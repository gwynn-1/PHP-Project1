<?php
include_once("dbConnect.php");
class HomeModel extends Connect{
    public function getFoodsToday(){
        $sql = "Select * From foods where today = 1";
        $this->setQuery($sql);
        return $this->LoadAll();
    }

    // public function getFoods(){
    //     $sql = "Select * From foods";
    //     $this->setQuery($sql);
    //     return $this->LoadAll();
    // }

    public function getFoodsCount(){
        $sql = "Select Count(id) count from foods";
        $this->setQuery($sql);
        return $this->Load();
    }

    public function getFoodsPagination($vitri = -1,$soluong=0){
        if($vitri<0 && $soluong <=0)
            $sql = "Select f.*,p.url From foods f inner join pageurl p on p.id=f.id_url";
        else
            $sql = "Select f.*,p.url From foods  f inner join pageurl p on p.id=f.id_url Limit $vitri,$soluong";
        $this->setQuery($sql);
        return $this->LoadAll();
    }
}
?>