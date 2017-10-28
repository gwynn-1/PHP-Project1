<?php

include_once("controller.php");
include_once("model/HomeModel.php");
include_once("model/pager.php");
include_once("model/AjaxPager.php");
class HomeController extends Controller{
    // function getIndex(){
    //     $model = new HomeModel();
    //     $today = $model->getFoodsToday();
    //     $tongSP = $model->getFoodsCount()->count;
    //     $currentpage = (isset($_GET['page']) && $_GET["page"]!=0) ? abs($_GET['page']) : 1;
    //     $pager = new Pager($tongSP,$currentpage,6,3);
    //     $from = ($currentpage -1)*$pager->get_nItemOnPage();
    //     $foods = $model->getFoodsPagination($from,$pager->get_nItemOnPage());
    //     $PagerHTML = $pager->showPagination();
    //     $arr_data = ['today'=>$today,'foods'=>$foods,'pager'=>$PagerHTML];
    //     return $this->loadView("trangchu",$arr_data);    
    // }

    private $model;

    public function __construct(){
        $this->model = new HomeModel();
    }

    function getIndex(){
        $today = $this->model->getFoodsToday();
        // $tongSP = $model->getFoodsCount()->count;
        // $currentpage = 1;
        // $pager = new AjaxPager($tongSP,$currentpage,6,3);
        // $from = ($currentpage -1)*$pager->get_nItemOnPage();
        // $foods = $model->getFoodsPagination($from,$pager->get_nItemOnPage());
        // $PagerHTML = $pager->showPagination();
        $arr_foods = $this->setAjax(1);
        $arr_data = ['today'=>$today,'foods'=>$arr_foods["foods"],'pager'=>$arr_foods["pager"]];
        return $this->loadView("trangchu",$arr_data);
    }

    function getIndexForAjax(){
        $currentpage = 1;
        if(isset($_GET['page']) && $_GET['page']!=0 && is_numeric($_GET['page'])){
            $currentpage = abs($_GET['page']);
        }
        $arr_foods = $this->setAjax($currentpage);
        return $this->loadPagerTrangChu($arr_foods);
    }

    function setAjax($currentpage){
        $tongSP = $this->model->getFoodsCount()->count;
        $pager = new AjaxPager($tongSP,$currentpage,6,3);
        $from = ($currentpage -1)*$pager->get_nItemOnPage();
        $foods = $this->model->getFoodsPagination($from,$pager->get_nItemOnPage());
        $PagerHTML = $pager->showPagination();

        $arr_food = ["foods"=>$foods,"pager" =>$PagerHTML];
        return $arr_food;
    }
}
?>