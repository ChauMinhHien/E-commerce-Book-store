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
if(Count($admin->checkUser($_POST['username']))>=1){
    header("location:../admin/index?err=5");
}else if(strlen($_POST['password'])<8){
    header("location:../admin/index?err=7");
}else if(ctype_upper($_POST['password'])||ctype_lower($_POST['password'])||is_numeric($_POST['password'])){
    header("location:../admin/index?err=8");
}
else if(isset($_POST['phone'])&&$_POST['phone']!=''){
    if(strlen($_POST['phone'])<10){
        header("location:../admin/index?err=6");
    }else{
        $admin->insert($_POST['username'],$_POST['password'],$_POST['name'],$_POST['email'],$_POST['phone']);
        header("location:../admin/index");
    }
}else{
    $admin->insert($_POST['username'],$_POST['password'],$_POST['name'],$_POST['email'],$_POST['phone']);
    header("location:../admin/index");
}
?>