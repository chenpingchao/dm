<?php

//sql语句
//链接数据库函数
function sqlbeign(){
    @$connect = mysql_connect(SERVER_IP.':'.SERVER_PORT,SERVER_USER,SERVER_PWD);
    mysql_select_db(DATABASE);
    mysql_set_charset(CHARSET);
    return $connect;
}
//添加语句
function insert($sql){
    if(mysql_query($sql)){
       return mysql_insert_id();
    }else{
        return false;
    }
}

//删除语句
function delete($sql){
    if( mysql_query($sql)){
        $num = mysql_affected_rows();
        return $num;
    }else{
        return false;
    }
}

//更新语句
function update($sql){
    if(mysql_query($sql)){
        $num = mysql_affected_rows();
        return $num;
    }else{
        return false;
    }
}
//单条查询语句
function oneSelect($sql){
    $resoult = mysql_query($sql);
    if($resoult && mysql_num_rows($resoult)>0){
        $arr = mysql_fetch_assoc($resoult);
        return $arr;
    }else{
        return false;
    }
}

//多条查询语句
function moreSelect($sql){
    $resoult = mysql_query($sql);
    if($resoult && mysql_num_rows($resoult)>0){
        while($rows = mysql_fetch_assoc($resoult)){
            $arr[] = $rows;
        }
        return $arr;
    }else{
        return false;
    }

}
//验证
//echo insert("insert into yh_goods(goodsname,price,bid,cid) value('huashou',9999,4,4)");
//echo delete("delete from yh_goods where id=14 limit 1");
//echo update("update yh_goods set price=price-201 where price>9000");
//echo "<pre>";
//print_r(oneSelect("select * from yh_goods where id=5"));
//print_r(moreSelect("select * from yh_goods where id<5"));