<?php
include_once("dbConnect.php");
class CheckoutModel extends Connect{
    public function insertCustomer($name,$gender,$email,$address,$phone,$message){
        $sql ="Insert into customers(name,gender,email,address,phone,note) Values('$name','$gender','$email','$address','$phone','$message')";
        $this->setQuery($sql);
        return $this->Execute();
    }

    public function insertBill($id_cus,$date_order,$total,$token,$tokendate){
        $sql = "Insert into bills(id_customer,date_order,total,payment_method,token,token_date)
                Values('$id_cus','$date_order','$total','cash','$token','$tokendate')";
    }
    public function insertBillDetail($id_bill,$id_food,$quantity,$price){
        $sql = "Insert into bill_detail(id_bill,id_food,quantity,price)
                Values($id_bill,$id_food,$quantity,$price)";
    }
}
?>