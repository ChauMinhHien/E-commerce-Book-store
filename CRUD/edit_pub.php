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
$publisher=new Publisher();

if(Count($publisher->checkPubname($_POST['pub_name']))>=1){
    header("location:../admin/index?errs=3");
}else{
    $publisher->update($_POST['pub_id'],$_POST['pub_name']);
    header("location:../admin/index");
}
?>