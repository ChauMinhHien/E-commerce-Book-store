<?php 
class Publisher extends Db 
{
    function all()
    {
        $sql='select * from Publisher';
        return $this->selectQuery($sql);
    }function insert($pubid,$pubname){
        $this->selectQuery("insert into publisher(pub_id,pub_name) values('$pubid','$pubname')");
    }function checkPubname($pubname){
        return $this->selectQuery("select * from publisher where pub_name='$pubname'");
    }function checkPubid($id){
        $check=$this->selectQuery("select * from `publisher` where pub_id='$id'");
        if(Count($check)==0){
            return $id;
        }
        $data=$this->selectQuery("select * from `publisher`");
        $i=0;
        $found=false;
        foreach($data as $value){
            $i++;
            $id=$id.($i);
            foreach($data as $v){
                if($id==$v['pub)Id']){
                    $found=true;
                }
            }if($found==true){
                $found=false;
            }else if($found==false){
                return $id;
            }
        }
        return $id.(Count($data)+1);
    }function delete($pubid){
        $this->selectQuery("delete from publisher where pub_id='$pubid'");
    }function search($pubid){
        return $this->selectQuery("select * from publisher where pub_id='$pubid'");
    }function update($pubid,$pubname){
        $this->selectQuery("update publisher set pub_name='$pubname' where pub_id='$pubid'");
    }
}