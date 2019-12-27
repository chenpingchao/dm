<?php
//商品模型
class GoodsModel extends Model{
    //设置表名
    protected static $table = "goods";
    //商品列表方法
    public function getlist(){
        $result = self::$db -> query("select * from ".self::$table);
        if($result && $result-> rowCount()>0 ){
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    //商品详情页方法
    public function getDetail($id){

        $result = self::$db -> query("select * from ".self::$table ." where id= $id limit 1" );
        if($result && $result-> rowCount()>0 ){
            return $result -> fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

}