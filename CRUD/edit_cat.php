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
$category=new Category();

if(Count($category->checkCatname($_POST['cat_name']))>=1){
    header("location:../admin/index?errs=2");
}else{
    $category->update($_POST['cat_id'],$_POST['cat_name']);
    header("location:../admin/index");
}
?>