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
    header("location:../admin/index?err=2");
}else{
    $explode=explode(' ',$_POST['cat_name']);
    foreach($explode as $word){
        $id.=strtolower(substr($word,0,1));
    }
    $id=$category->checkCatid($id);
    $category->insert($id,$_POST['cat_name']);
    header("location:../admin/index");
}
?>