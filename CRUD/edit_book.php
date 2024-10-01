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
$data=$book->search($_POST['book_id']);
if(isset($_POST['sale'])&&$_POST['sale']!=''){
    if(intval($_POST['sale'])>=intval($_POST['price'])){
        header("location:../admin/index?errs=1");
    }else{
        if($_FILES['img']['size'] != 0){
            $a=substr($_FILES['img']['name'],-4);
            $b=$_POST['book_id'].''.$a;
            unlink('../images/book/'.$b);
            move_uploaded_file($_FILES['img']['tmp_name'],'../images/book/'.$b);
            $book->update($_POST['book_id'],$_POST['book_name'],$_POST['description'],$_POST['price'],$b,$_POST['pub_id']
                                ,$_POST['cat_id'],$_POST['featured'],$_POST['pages'],$_POST['sale']);
            header("location:../admin/index");
            return;
        }
        foreach($data as $v){
            $book->update($_POST['book_id'],$_POST['book_name'],$_POST['description'],$_POST['price'],$v['img'],$_POST['pub_id']
                                ,$_POST['cat_id'],$_POST['featured'],$_POST['pages'],$_POST['sale']);
            header("location:../admin/index");
        }
    }
}else{
    if($_FILES['img']['size'] != 0){
        $a=substr($_FILES['img']['name'],-4);
        $b=$_POST['book_id'].''.$a;
        unlink('../images/book/'.$b);
        move_uploaded_file($_FILES['img']['tmp_name'],'../images/book/'.$b);
        $book->insert($_POST['book_name'],$_POST['description'],$_POST['price'],$b,$_POST['pub_id']
                            ,$_POST['cat_id'],$_POST['featured'],$_POST['pages']);
        header("location:../admin/index");
        return;
    }
    foreach($data as $v){
        $book->update($_POST['book_id'],$_POST['book_name'],$_POST['description'],$_POST['price'],$v['img'],$_POST['pub_id']
                            ,$_POST['cat_id'],$_POST['featured'],$_POST['pages']);
        header("location:../admin/index");
    }
}
?>