<?php
header("Content-Type:text/html;charset:utf-8");
//三天打鱼两天晒网
/*    $start = strtotime("2012-01-01 00:00:00");
    $now1 = strtotime("now");
    $day1 = ceil(($now1-$start)/86400);
    //echo $day1;
    $day1 = $day1%5;
    $arrange = array("晒网","打鱼","打鱼","打鱼","晒网");
    echo $arrange[$day1];

    //明年的今天
    $now2 = strtotime("+1 year");
    $day1 = ceil(($now2-$start)/86400);
    $day1 = $day1%5;
    echo $arrange[$day1];
//函数版本*/

//制作日历
//时间戳
$now_day = isset($_GET['time']) ? $_GET['time'] : time();
//上一月
$last_month = strtotime( "-1 month",$now_day);
//    下一月
$next_month = strtotime('+1 month',$now_day);
//当前年
$year = date('Y',$now_day);
//当月
$month = date('m',$now_day);


//当月有多少天
$tian = date('t',$now_day);

//本月1号是周几
$we = date('w',mktime(0,0,0,$month,1,$year));

echo <<<xxxxxx
<table width="50px" cellspacing="0" border="1" cellpadding="5px" rules="rows">
    <caption>    
        <a href="?time={$last_month}"> << </a>
        {$year}年{$month}月
        <a href="?time={$next_month}"> >> </a>
    </caption>    
    <tr>
        <td>日</td>
        <td>一</td>
        <td>二</td>
        <td>三</td>
        <td>四</td>
        <td>五</td>
        <td>六</td>
    </tr>
    <tr>       

xxxxxx;

//打空格
for( $k=0;$k<$we ; $k++){
    echo "<td></td>";
}
//填天数；
for($ti=1 ; $ti<=$tian; $ti++) {
    if($year==date('Y') && $month==date('m') && $ti==date('d')){
//        今天
        echo "<td style='background:red;color:white'>$ti</td>";
    }else{
    echo "<td>$ti</td>";
    }
//    换行
    if (($k + $ti) % 7 == 0) {
        echo "</tr><tr>";
    }
}
//    补空格
$k1 = ($tian+$we)%7==0 ? 0 : 7-($tian+$we)%7 ;
//echo $k1;
for ($k2 = 1;$k2<=$k1; $k2++) {
    echo '<td></td>';
}
echo "</tr></table>";


//一、举例说明数组元素操作相关函数的应用
/*$arr1 = array('a','b','c','d','e','f','g','h','i') ;
//查找一段值并以数组返回
print_r(array_slice($arr1,3,4,true));echo "<br>";
print_r(array_slice($arr1,3,4,false));echo "<br>";
//随机返回数组键名
print_r(array_rand($arr1,2));echo "<br>";
print_r(array_rand($arr1,2));echo "<br>";
//数组元素从新排列
print_r(shuffle($arr1));echo "<br>";
//将原序列翻转
print_r(array_reverse($arr1,true));echo "<br>";
print_r(array_reverse($arr1,false));echo "<br>";*/
//二、举例说明数组排序相关函数的应用\
/*$arr2 = array(1=>'d',5=>'b',2=>'f',7=>'h',4=>'e',6=>'a',0=>'c') ;
//对数组元素按照键值升序排列
sort($arr2);
print_r($arr2);echo "<br>";
//对数组元素按照键值降序排列
rsort($arr2);
print_r($arr2);echo "<br>";
//对数组元素按照键值升序排列并保留键名
asort($arr2);
print_r($arr2);echo "<br>";
//对数组元素按照键值降序排列并保留键名
arsort($arr2);
print_r($arr2);echo "<br>";
//对数组元素按照键名升序排列
ksort($arr2);;;
print_r($arr2);echo "<br>";
//对数组元素按照键名升序排列
krsort($arr2);
print_r($arr2);echo "<br>";*/
//三、举例说明数组操作相关函数的应用
/*//返回一个包含从 low 到 high 之间的元素的数组
//print_r(range(12,143,6));
//合并多个数组
$arr2 = ['df','gr','ty','li'];
$arr3 = [4,2,6,1,89,23];
print_r(array_merge($arr2,$arr3));
//合并多个数组并不会覆盖相同键名的元素
echo '<pre>';
$arr2 = ['q'=>'df','w'=>'gr','e'=>'ty','r'=>'li','t'=>'sd'];
$arr3 = ['q'=>4,'w'=>2,'e'=>6,'r'=>1,'t'=>89];
print_r(array_merge_recursive($arr2,$arr3));*/
//四、举例说明数组键、值相关函数的应用
/*//返回数组键名组成新的数组
$arr4 = ['a'=>1,'b'=>2,'v'=>43,'c'=>5,'g'=>6,'r'=>2176,'as'=>13];
print_r(array_keys($arr4));echo"<br>";
//返回一个包含所有键值组成新的数组，不保留键名
print_r(array_values($arr4));echo"<br>";
//删除数组中的重复值返回新的数组
print_r(array_unique($arr4));echo"<br>";
//翻转数组中的值并返回翻转后的数组
print_r(array_flip($arr4));echo"<br>";
//检查指定的键名是否在数组中
print_r(array_key_exists('a',$arr4));echo"<br>";
//搜索数组中是否存在指定的值
print_r(in_array(5,$arr4));echo"<br>";*/
//五、举例说明与数组相关的非数组函数库函数的应用
/*$arr5 = ['1wr','ser','tyd','rths'];
//判断是否为数组
echo is_array(123);echo "<br>";
echo is_array([1,2]);echo "<br>";
//把字符串分割为数组
print_r(explode(".","14.3.4.8.78.543"));echo "<br>";
//把数组元素组合成字符串
print_r(implode(",",$arr5));echo "<br>";
//把数组中的值符给一些变量
list($va1,$va2,$va3) = $arr5;
echo $va1."<br>";
echo $va2."<br>";
echo $va3."<br>";*/
//六、举例说明数学函数的应用
/*//绝对值
echo abs(-123)."<br>";
//施舍五入
echo round(12.51,1)."<br>";
//向上进一取整
echo ceil(9.1)."<br>";
//向下舍一取整
echo floor(9.9)."<br>";
//生成随机数
echo rand(10,30)."<br>";
//生成更好的随机数
echo mt_rand(50,80)."<br>";
//幂运算
echo pow(3,4)."<br>";
//圆周率
echo pi()."<br>";
//最大值
print_r(max(121,457,827,21,532,5));echo "<br>";
print_r(max(array(1,2,5,83,23)));echo "<br>";
print_r(max(array(4,672,1365,243,),array(3,3,67234,64)));echo "<br>";
//最小值
print_r(min(121,457,827,21,532,5));echo "<br>";
print_r(min(array(1,2,5,83,23)));echo "<br>";
print_r(min(array(4,672,1365,243,),array(3,3,67234,64)));echo "<br>";*/
//七、设置时区的三种方式？
/*//1修php.ini配置文件 date.timezone =PRC;
//2.ini_set()
ini_set('date.timezone','PRC');
print_r(ini_get('date.timezone'));
//3.date_default_timezone_set()
date_default_timezone_set("UTC");
print_r(date_default_timezone_get());*/
//八、如何获取时间戳，有哪几种方式？
    /*//1.
    print_r(time());echo "<br>";
    /   /2.
    print_r(microtime());echo "<br>";
    //3.
    print_r(mktime(23,59,59,12,31,1999));echo "<br>";
    //4.
    print_r(strtotime("now"));echo "<br>";
    //5.
    echo "<pre>";
    print_r(getdate());echo "<br>";*/
//九、输出如下格式的日期：2017年5月7日 星期日 08:01:02/
/*$week = ['日','一','二','三','四','五','六'];
$date1 = mktime(8,1,2,5,7,2017);
$w = $week[date('w')];
echo date("Y年m月d日 星期{$w}  H小时i分s秒 ",$date1);*/