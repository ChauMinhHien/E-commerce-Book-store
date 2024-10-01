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
$book=new Book();
$category=new Category();
$publisher=new Publisher();
$users=new users();

if($_GET['type']=='cat'){
    $data=$book->sameCat($_GET['id']);
    if(Count($data)==0){
        $category->delete($_GET['id']);
        header("location:../admin/index");
    }
    else{
        foreach($data as $books){
            $book->delete($books['book_id']);
        }
        $category->delete($_GET['id']);
        header("location:../admin/index");
    }
}
else if($_GET['type']=='pub'){
    $data=$book->samePub($_GET['id']);
    if(Count($data)==0){
        $publisher->delete($_GET['id']);
        header("location:../admin/index");
    }
    else{
        foreach($data as $books){
            $book->delete($books['book_id']);
        }
        $publisher->delete($_GET['id']);
        header("location:../admin/index");
    }
}else if($_GET['type']=='book'){
    $data=$book->search($_GET['id']);
    foreach($data as $v){
        $url="../images/book/{$v['img']}";
    }
    unlink($url);
    $book->delete($_GET['id']);
    header("location:../admin/index");
}else if($_GET['type']=='admin'){
    if($_GET['id']=='admin'){
        header("location:../admin/index?del=1");
    }else{
        $admin->delete($_GET['id']);
        header("location:../admin/index");
    }
}else if($_GET['type']=='user'){
    $users->delete($_GET['id']);
    header("location:../admin/index");
}