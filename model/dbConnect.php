<?php
    class Connect{
        public $_mysqli;
        public $_sql;
        
        public function __construct(){
            $this->_mysqli= new mysqli("localhost","root","","nha_hang");
            $this->_mysqli->query("set names 'utf8'");
            if($this->_mysqli->connect_errno){
                echo "Lỗi kết nối";
                die;
            }
        }

        public function setQuery($query){
            $this->_sql=$query;
        }

        public function Execute(){
            return $this->_mysqli->query($this->_sql);
        }

        public function Load(){
            $result = $this->Execute();
            if($result){
                return $result->fetch_object();
            }
            return false;
        }

        public function LoadAll(){
            $result = $this->Execute();
            $data_list = Array();
            if($result){
                while($row = $result->fetch_object()){
                    array_push($data_list,$row);
                }
            }
            return $data_list;
        }
        public function getLastId(){
            return $this->_mysqli->insert_id;
        }

        public function Disconnect(){
            $this->_mysqli = null;
        }
    }

    // function VN_to_URLstring($string){
    //     $array = ["a"=>["à","á","ả","ã","ạ","ă","ằ","ắ","ẳ","ẵ","ặ","â","ầ","ấ","ẩ","ẫ","ậ","A","À","Á","Ả","Ã","Ạ","Ặ","Ằ","Ắ","Ẳ","Ẵ","Ặ","Ậ","Ầ","Ấ","Ẩ","Ẫ","Ậ"],
    //               "e"=>["ê","ề","ế","ể","ễ","ệ","è","é","ẻ","ẽ","ẹ","E","Ê","Ề","Ế","Ể","Ễ","Ệ","È","É","Ẻ","Ẽ","Ẹ"],
    //               "o"=>["ò","ó","ỏ","õ","ọ","ồ","ố","ổ","ỗ","ô","ộ","ơ","ờ","ớ","ở","ỡ","ợ","O","Ò","Ó","Ỏ","Õ","Ọ","Ồ","Ố","Ổ","Ỗ","Ô","Ộ","Ơ","Ờ","Ớ","Ở","Ỡ","Ợ"],
    //               "u"=>["ù","ú","ủ","ũ","ụ","ư","ừ","ứ","ử","ữ","ự","U","Ù","Ú","Ủ","Ũ","Ụ","Ự","Ừ","Ứ","Ử","Ữ","Ự"],
    //               "i"=>["ì","í","ỉ","ĩ","ị","Ì","Í","Ỉ","Ĩ","Ị","I"],
    //               "d"=>["đ","Đ"],
    //               "y"=>["ỳ","ý","ỷ","ỹ","ỵ","Ỳ","Ý","Ỷ","Ỹ","Ỵ","Y"],
    //     ];

    //     foreach ($array as $nounicode=>$unicode){
    //         $string = str_replace($unicode,$nounicode,$string);
    //     }
    //     $string = str_replace(" ","-",$string);
    //     return $string;
    // }

    // function htaccess_String($str){
    //     $str = trim($str);
    //     $str = str_replace("","@",$str);
    //     $str = str_replace("","%",$str);
    //     $str = str_replace("","$",$str);
    //     $str = str_replace("","?",$str);
    //     $str = str_replace("","/",$str);
    //     $str = str_replace("","#",$str);
    //     $str = strtolower($str);
    //     $str = VN_to_URLstring($str);
    //     return $str;
    // }

    // $db = new Connect();
    // $db->setQuery("Select * from pageurl");
    // $food_url = $db->LoadAll();
    // foreach($food_url as $url){
    //     $url_name = htaccess_String($url->url);
    //     $db->setQuery("Update pageurl set url = '$url_name' where id = $url->id");
    //     $db->Execute();
    // }
?>