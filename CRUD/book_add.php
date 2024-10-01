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
if(Count($book->checkBookname($_POST['book_name']))>=1){
    header("location:../admin/index?err=4");
}
else if(isset($_POST['sale'])&&$_POST['sale']!=''){
    if(intval($_POST['sale'])>=intval($_POST['price'])){
        header("location:../admin/index?err=1");
    }else{
        $id=$book->getId();
        $a=substr($_FILES['img']['name'],-4);
        $b=$id.''.$a;
        move_uploaded_file($_FILES['img']['tmp_name'],'../images/book/'.$b);
        $book->insert($_POST['book_name'],$_POST['description'],$_POST['price'],$b,$_POST['pub_id']
                            ,$_POST['cat_id'],$_POST['featured'],$_POST['pages'],$_POST['sale']);
        header("location:../admin/index");
    }
}else{
    $id=$book->getId();
    $a=substr($_FILES['img']['name'],-4);
    $b=$id.''.$a;
    move_uploaded_file($_FILES['img']['tmp_name'],'../images/book/'.$b);
    $book->insert($_POST['book_name'],$_POST['description'],$_POST['price'],$b,$_POST['pub_id']
                        ,$_POST['cat_id'],$_POST['featured'],$_POST['pages']);
    header("location:../admin/index");
}
?>