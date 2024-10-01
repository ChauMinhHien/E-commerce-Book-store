<?php
class users extends Db{
    function check($email,$pass){
        $p=md5($pass);
        return $this->selectQuery("select * from users where email='$email' and password='$p'");
    }function addUser($email,$name,$pass,$address,$phone=null){
        $p=md5($pass);
        if($phone==null){
            $sql="insert into users(email,name,password,address) values(?,?,?,?)";
            $arr=[$email,$name,$p,$address];
            $this->selectQuery($sql,$arr);
        }else{
            $sql="insert into users(email,name,password,address,phone) values(?,?,?,?,?)";
            $arr=[$email,$name,$p,$address,$phone];
            $this->selectQuery($sql,$arr);
        }
    }function CheckEmail($email){
        $data=$this->selectQuery("select * from users where email='$email'");
        return Count($data);
    }function all(){
        return $this->selectQuery("select * from users");
    }function delete($email){
        $this->selectQuery("delete from users where email='$email'");
    }
}