<?php
include '../config.php';
function loadClass($name)
{
	if (is_file("../model/$name.php"))
		include "../model/$name.php";
	else {
		echo 'not found';
	}
}
spl_autoload_register('loadClass');
$admin=new Admin();
if (!isset($_SESSION)) session_start();
$user=$_POST['username'];
$pass=$_POST['password'];
$remember=isset($_POST['remember'])?$_POST['remember']:[];
$data=$admin->findAdmin($user,$pass);
if(Count($data)==1){
    if($remember!=[]){
        $_SESSION['admin']=['username'=>$user,'password'=>$pass];
        $_SESSION['adminr']=['username'=>$user,'password'=>$pass];
        $_SESSION['allow']='yes';
        header("location:./index");
    }else{
        unset($_SESSION['admin']);
        $_SESSION['adminr']=['username'=>$user,'password'=>$pass];
        $_SESSION['allow']='yes';
        header("location:./index");
    }
}else{
    $_SESSION['allow']='no';
    header("location:login?err=1");
}
?>
