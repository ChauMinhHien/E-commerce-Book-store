<?php 
class Category extends Db 
{
    function all()
    {
        $sql='select * from category';
        return $this->selectQuery($sql);
    }
    function catName($catid){
        return $this->selectQuery("select cat_name from category where cat_id='$catid'");
    }function insert($catid,$catname){
        $this->selectQuery("insert into category(cat_id,cat_name) values('$catid','$catname')");
    }function checkCatname($catname){
        return $this->selectQuery("select * from category where cat_name='$catname'");
    }function checkCatid($id){
        $check=$this->selectQuery("select * from `category` where cat_id='$id'");
        if(Count($check)==0){
            return $id;
        }
        $data=$this->selectQuery("select * from `category`");
        $i=0;
        $found=false;
        foreach($data as $value){
            $i++;
            $id=$id.($i);
            foreach($data as $v){
                if($id==$v['cat_id']){
                    $found=true;
                }
            }if($found==true){
                $found=false;
            }else if($found==false){
                return $id;
            }
        }
        return $id.(Count($data)+1);
    }function delete($catid){
        $this->selectQuery("delete from category where cat_id='$catid'");
    }function search($catid){
        return $this->selectQuery("select * from category where cat_id='$catid'");
    }function update($catid,$catname){
        $this->selectQuery("update category set cat_name='$catname' where cat_id='$catid'");
    }
}