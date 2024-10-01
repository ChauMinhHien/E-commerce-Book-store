<?php
class Orderdetails extends Db{
    function insert($order_id,$book_id,$quantity,$price){
        $sql="insert into order_detail(order_id,book_id,quantity,totalPrice) values(?,?,?,?)";
        $arr=[$order_id,$book_id,$quantity,$price];
        $this->selectQuery($sql,$arr);
    }
    function bestSellers(){
        return $this->selectQuery("select *,sum(quantity) as `sum` FROM `order_detail` group by book_id order by `sum` DESC limit 12");
    }function all(){
        return $this->selectQuery("select order_detail.*,book.book_name as book_name from order_detail,book where order_detail.book_id=book.book_id");
    }
}