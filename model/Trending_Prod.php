<?php
class Trending_Prod extends Db{
    function insert($page_url,$book_id){
        $p=md5($page_url);
        $data=$this->selectQuery("select * from trending_product where page_id='$p'");
        if(Count($data)==0){
            $sql="insert into trending_product(page_id,book_id,counter) values(?,?,?)";
            $arrParam =[$p,$book_id,1];
            $this->selectQuery($sql, $arrParam);
        }else{
            $sql="select * from trending_product where page_id='$p'";
            $data1=$this->selectQuery($sql);
            foreach($data1 as $v){
                $int=intval($v['counter'])+1;
            }
            $sql1="update trending_product set counter=$int where book_id='$book_id'";
            $this->selectQuery($sql1);
        }
    }
    function getTrending(){
        return $this->selectQuery("select * from trending_product,book where trending_product.book_id=book.book_id order by counter DESC limit 4");
    }
}