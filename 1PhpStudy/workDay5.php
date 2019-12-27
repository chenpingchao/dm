<?php
//数组的声明
/*//方法一直接赋值声明
$arr[0] = 123;
$arr[1] = 546;
$arr[2] = 435;
print_r($arr);*/
/*//方法二
$arr1 = array(123,435,'wre',235,'er','rwe',423,);
$arr2 = array('01'=>12 , '02'=>123 , '03'=>897 );
print_r($arr1);
echo "<br>";
print_r($arr2);*/
/*//方法三
$arr3 = [12,435,56,8,27,46] ;
$arr4 = ['01'=>12,'02'=>435,'03'=>56,'04'=>8,];
print_r($arr3);
echo "<br>";
print_r($arr4);*/
//数组下标自动转换
/*$arr5["8"] = 000 ;
$arr6["08"] = 000 ;
$arr7[8.1] = 000 ;
$arr8['8.1'] = 000 ;
print_r ($arr5);
print_r ($arr6);
print_r ($arr7);
print_r ($arr8);
//布尔型
$arr9 [true] = 000;
$arr10[false] = 000;
print_r ($arr9);
print_r ($arr10);
//空值
$arr11[null] = 000;
print_r ($arr11);
$arr11[array] = 000;
print_r ($arr11);
$arr11[2] = 000;
$arr11[2] = 1111;
print_r ($arr11);
$arr12 = array(1111 , "10"=>129 , 1233);
print_r ($arr12);*/
//索引数组*/
/*$array[] = 'qw';
$array[] = 'er';
$array[] = 'qty';
$array[] = 'uio';
print_r($array);*/
//关联数组
/*$aaa['name'] = 'as';
$aaa['sex'] = 'df';
$aaa['old'] = '234';
$aaa['cm'] = '171';
print_r($aaa);*/
//混合数组
/*$abc =[ 'as'=>123,'你好','不好',78=>23 ,87 ];
print_r($abc);*/
//多维数组
///*$a = array(
//    array(
//        'ee'=>123,
//        'ww' =>1234,
//        'qq' =>array('唱','跳','rap','篮球')
//    ),
//    array(
//        'ee'=>198,
//        'ww' =>98,
//        'qq' =>array('唱','跳','rap','篮球')
//    ),
//    array(
//        'ee'=>1123,
//        'ww' =>187,
//        'qq' =>array('唱','跳','rap','篮球')
//    )
//);
///*//print_r($a[1]['yy'][2]);
//使用foreach遍历
/*foreach($a as $value){
    echo $value['ee'].'<br>';
}*/
/*foreach($a as $v){
    $bb = $v['ee'].'技能有';
    foreach($v['qq'] as $va ){
        $bb .= $va;
    };
}
echo $bb;*/
//数组统计的相关函数
/*$arr13 = ['wwe','123','234',234,'werw','gfhg','wwe'];
//统计数组元素的数目
echo count($arr13)."<br>";
//count的别名
echo sizeof($arr13).'<br>';
//统计值出现的次数
print_r(array_count_values($arr13));*/
//指针移动的相关函数
/*$arr14 = ['sdfk','iaus',123,'324sd','234sd','234','erew'];
print_r(current($arr14));echo"<br>";
print_r(key($arr14));echo"<br>";
print_r(next($arr14));echo"<br>";
print_r(prev($arr14));echo"<br>";
print_r(end($arr14));echo"<br>";
print_r(reset($arr14));
echo"<br>";*/

//插入，删除数组元素
$arr15 = ['你好','你不好','1234','abcd'];
//头部插入
print_r(array_unshift($arr15 ,'zz' ,'xx' ));echo "<br>";
//尾部插入
print_r(array_push($arr15,'aa','bb'));echo "<br>";
//删除首元素
print_r(array_shift($arr15));echo "<br>";
//删除尾部元素
print_r(array_pop($arr15));echo "<br>";
//删除或替换指定元素
print_r(array_splice($arr15,2,2,['qwe','vdfaw']));echo "<br>";
