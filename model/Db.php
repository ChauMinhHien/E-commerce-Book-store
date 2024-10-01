<?php 
class Db{
    protected $connect = null;
    public $n = 0;
    function __construct()
    {
        $this->connect = new PDO('mysql:host=' . HOST .';dbname='.DB, USER, PASSWORD );
        $this->connect->query('set names utf8');
    }
    protected function selectQuery($sql, $arrParam=[])
    {
        $stm = $this->connect->prepare($sql);
        $stm->execute($arrParam);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        $this->n = $stm->rowCount();
        return $data;
    }
    protected function updateQuery($sql, $arrParam=[])
    {
        $stm = $this->connect->prepare($sql);
        $stm->execute($arrParam);
        $this->n = $stm->rowCount();
        return $this->n;
    }
}
