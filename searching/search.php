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
$book=new Book();
$search=isset($_GET['search'])?$_GET['search']:[];
$data=$book->advancedSearch($search);
if(Count($data)==0){
    header("location:../404error");
}
else if(Count($data)==1){
    foreach($data as $v){
        header("location:../productdetail?id={$v['book_id']}");
    }
}else{
    header("location:../products?search=$search");
}
