<?php 
class Book extends Db 
{
    function all()
    {
        $sql='select * from book';
        return $this->selectQuery($sql);//arrPram=[]
    }
    function random($n=25)
    {
        return $this->selectQuery("select * from book order by rand() limit $n");
    }
    function featured()
    {
        return $this->selectQuery("select * from book where FEATURED='yes' order by rand() limit 1");
    }
    function latestBooks()
    {
        return $this->selectQuery("select * from book order by DATEADDED DESC limit 3;");
    }
    function sameCat($cat_id){
        $sql="select book.* from book,category where book.cat_id=category.cat_id and category.cat_id=?";
        $arrParam=[$cat_id];
        return $this->selectQuery($sql,$arrParam);
    }function samePub($pub_id){
        $sql="select book.* from book,publisher where book.pub_id=publisher.pub_id and book.pub_id=?";
        $arrParam=[$pub_id];
        return $this->selectQuery($sql,$arrParam);
    }function sameCatNum($cat_id){
        $sql="select book.* from book,category where book.cat_id=category.cat_id and category.cat_id=?";
        $arrParam=[$cat_id];
        $data=$this->selectQuery($sql,$arrParam);
        return Count($data);
    }function samePubNum($pub_id){
        $sql="select book.* from book,publisher where book.pub_id=publisher.pub_id and publisher.pub_id=?";
        $arrParam=[$pub_id];
        $data=$this->selectQuery($sql,$arrParam);
        return Count($data);
    }
    function newBook(){
        return $this->selectQuery("select * from `book` where month(DATEADDED)=month(CURDATE()) and year(DATEADDED)=year(CURDATE())");
    }

    function search($name='')
    {
        $sql ='select * from book where book_id=?';
        $arrParam =[$name];
        return $this->selectQuery($sql, $arrParam);
    }
    
    function search1($name='')
    {
        $sql ='select * from book where book_id=? ';
        $arrParam =[$name];
        $data=$this->selectQuery($sql, $arrParam);
        if (Count($data)>0) return $data[0];
        return false;
    }
    function advancedSearch($search){
        $data=$this->selectQuery("select book.* from book where book_name like '%$search%'");
        if(Count($data)!=0){
            return $data;
        }
        $data=$this->selectQuery("select book.* from book,category where book.cat_id=category.cat_id and cat_name like '%$search%'");
        if(Count($data)!=0){
            return $data;
        }return $this->selectQuery("select book.* from book,publisher where publisher.pub_id=book.pub_id and pub_name like '%$search%'");

    }function getId(){
        $data=$this->selectQuery("select * from `book`");
        $i=0;
        $found=false;
        foreach($data as $value){
            $i++;
            $id="book_".($i);
            foreach($data as $v){
                if($id==$v['book_id']){
                    $found=true;
                }
            }if($found==true){
                $found=false;
            }else if($found==false){
                return $id;
            }
        }
        return "book_".(Count($data)+1);
    }function insert($book_name,$descrip,$price,$img,$pubid,$catid,$featured,$pages,$sale=null){
        $id=$this->getId();
        if($sale==null){
            $this->selectQuery("insert into book(book_id,book_name,description,price,img,pub_id,cat_id,FEATURED,DATEADDED,pages)
                values('$id','$book_name','$descrip',$price,'$img','$pubid','$catid','$featured' ,CURDATE(),$pages)");
        }else{
            $this->selectQuery("insert into book(book_id,book_name,description,price,img,pub_id,cat_id,FEATURED,DATEADDED,pages,SALE)
                values('$id','$book_name','$descrip',$price,'$img','$pubid','$catid','$featured' ,CURDATE(),$pages,$sale)");
        }
    }function checkBookname($bookname){
        return $this->selectQuery("select * from `book` where book_name='$bookname'");
    }function delete($book_id){
        $this->selectQuery("delete from book where book_id='$book_id'");
    }function update($book_id,$book_name,$descrip,$price,$img,$pubid,$catid,$featured,$pages,$sale=null){
        if($sale==null){
            $this->selectQuery("update `book` set book_name='$book_name',description='$descrip'
                    ,price='$price',img='$img',pub_id='$pubid',cat_id='$catid'
                    ,FEATURED='$featured',pages='$pages',SALE='$sale' WHERE book_id='$book_id'");
            return;
        }
        $this->selectQuery("update `book` set book_name='$book_name',description='$descrip'
                    ,price='$price',img='$img',pub_id='$pubid',cat_id='$catid'
                    ,FEATURED='$featured',pages='$pages' WHERE book_id='$book_id'");
        return;
    }
}