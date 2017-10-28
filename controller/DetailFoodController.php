<?php
include_once('Controller.php');
include_once('model/detailFoodModel.php');

class DetailFoodController extends Controller{
	public function getIndex(){
		$alias = $_GET['alias'];
		$id = (int)$_GET['id'];

		$model = new DetailFoodModel();
		$food = $model->getDetail($alias,$id);
		$related_food= $model->getFoodByType($id);
		if($food == null){
            header("Location:404.php");
        }
		else{
			$arrData = ['food'=>$food,'relate_food'=>$related_food];
			return $this->loadView('chitiet-monan',$arrData);
		}
	}
}