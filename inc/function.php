<?php
    function createToken(){
        $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        $str_len = strlen($str);
        $result='';
        for($i=0;$i<32;$i++){
            $num = rand(0,$str_len);
            $result .= substr($str,$num,1);
        }
        return $result;
    }

    echo createToken();
?>