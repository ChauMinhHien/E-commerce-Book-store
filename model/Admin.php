<?php
class Admin extends Db{
    function findAdmin($username,$password){
        $pass=md5($password);
        return $this->selectQuery("select * from admin where username='$username' and password='$pass'");
    }function all(){
        return $this->selectQuery("select * from admin");
    }function checkUser($username){
        return $this->selectQuery("select * from admin where username='$username'");
    }function insert($username,$password,$name,$email,$phone=null){
        $pass=md5($password);
        if($phone==null){
            $this->selectQuery("insert into admin(username,password,name,email) values('$username','$pass','$name','$email')");
            return;
        }
        $this->selectQuery("insert into admin(username,password,name,email,phone) values('$username','$pass','$name','$email','$phone')");
    }function delete($username){
        $this->selectQuery("delete from admin where username='$username'");
    }
}