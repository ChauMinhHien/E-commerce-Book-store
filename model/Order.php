<?php
class Order extends Db{
    function insert($email,$name,$address,$phone=null){
        $id=$this->getOrderid();
        if($phone==null){
            $sql="insert into `order`(order_id,email,consignee_name,address) values('$id',?,?,?)";
            $arrParam=[$email,$name,$address];
            $this->selectQuery($sql,$arrParam);
            return $id;
        }else{
            $sql="insert into `order`(order_id,email,consignee_name,consignee_phone,address) values('$id',?,?,?,?)";
            $arr=[$email,$name,$phone,$address];
            $this->selectQuery($sql,$arr);
            return $id;
        }
    }
    function getOrderid(){
        $data=$this->selectQuery("select * from `order`");
        $i=0;
        $found=false;
        foreach($data as $value){
            $i++;
            $id="order_".($i);
            foreach($data as $v){
                if($id==$v['order_id']){
                    $found=true;
                }
            }if($found==true){
                $found=false;
            }else if($found==false){
                return $id;
            }
        }
        return "order_".(Count($data)+1);
    }function all(){
        return $this->selectQuery("select * from `order`");
    }
}