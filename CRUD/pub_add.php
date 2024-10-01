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
    header("location:../admin/index?err=3");
}else{
    $explode=explode(' ',$_POST['pub_name']);
    foreach($explode as $word){
        $id.=strtolower(substr($word,0,1));
    }
    $id=$publisher->checkPubid($id);
    $publisher->insert($id,$_POST['pub_name']);
    header("location:../admin/index");
}
?>