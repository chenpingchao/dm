<?php
header("Content-Type:text/html;charest:utf-8;");
//一、举例说明去除左右空白字符函数的应用
/*$str1 = "   mmmm    mm  ";
echo $str1.'<br>';
//清除左侧空白字符
echo ltrim($str1)."<br>";
//清除右侧空白字符
echo rtrim($str1).'<br>';
//清除两边空白字符
echo trim($str1)."<br>";*/
//二、举例说明字符串大小写转换函数的应用
/*$str2 = "it's a big Boom";
//所有字母转化为小写
echo strtolower($str2).'<br>';
//所有字母转换为大写
echo strtoupper($str2)."<br>";
//首字母转换为大写i
echo ucfirst($str2).'<br>';
//字符串中所有单词的首字母大写
echo ucwords($str2).'<br>';*/
//三、举例说明html标签处理函数的应用
/*//nl2br()
echo nl2br("你好啊\n 不，我不好")."<br>"
//htmlspecicalchars部分转化
$str4 = "#()_lksf <br>wer<i>fdifkfdksh</i>";
echo htmlspecialchars($str4)."<br>";
echo htmlspecialchars_decode($str4)."<br>";
//所有字符都进行转化
echo"<br>";
echo htmlentities($str4);
echo html_entity_decode($str4);*/
//四、举例说明字符串加密函数的应用
/*//sha1()加密40字符16进制
echo sha1("123123123").'<br>';
//md5()加密 32字符16进制
echo md5("123123123");*/
//五、举例说明查找字符串出现位置函数的应用
/*$str5 = "jjan Jai chan han yi xZiao";
//查找字符串在另一字符串中第一次出现的位置（大小写敏感）
echo strpos($str5 , "J",0)."<br>";
//查找字符串在另一字符串中第一次出现的位置(大小写不明感)
echo stripos($str5 ,"J" ,0).'<br>';
//查找字符串在另一字符串中最后一次出现的位子（大小写敏感）；
echo strrpos($str5,"i" ,0)."<br>";
//查找字符串在另一字符串中最后一次出现的位子（大小写不敏感）；
echo strripos($str5,"i",0);
//strtr将查找到的最早出现的元素至结束的字符串返回
echo strstr($str5,"i").'<br>';
//strtr将查找到的最晚出现的元素至结束的字符串返回
echo strrchr($str5,"i");*/

//六、举例说明字符串的截取函数的应用
/*$str6 = "zi fu chuan de jie qu ji yin yong ";
echo substr($str6 ,15,10)."<br>";
echo substr($str6 ,15,-4)."<br>";
echo substr($str6 ,-20,5)."<br>";
echo substr($str6 ,-20,-5)."<br>";
$str7 = "一二三四一二三四一三";
echo substr($str7,5,6)."<br>";
echo mb_substr($str7 ,0,7);*/
//七、举例说明字符串的替换函数的应用
/*$str6 = "zi fu chuan Ji de jie qu ji yin yong ";
//替换字符串中的一些字符,大小写敏感
echo str_replace('ji' , 'gungungun',$str6)."<br>";
//替换字符串中的一些字符,大小写不敏感
echo str_replace('ji' , 'gungungun',$str6)."<br>";
//把字符串中的一部分替换成另一个字符串
echo substr_replace($str6,"aaaaaaaaa",7,20);*/
//八、举例说明字符串的分割函数的应
/*$str6 = "zi fu chuan Ji de jie qu ji yin yong ";
    //把字符串割成一连串的更小的部分
echo chunk_split($str6,4,"---")."<br>";
    //把字符串按指定的长度分割为数组
print_r(str_split($str6,5));echo "<br>";
    //把字符串按指定的分隔符分割为数组
print_r(explode(' ',$str6));echo "<br>";
    //把数组元素组合为字符串
$arr1 = ['dwf','aer','aerf','efwaf','weaf'];
print_r(implode("#",$arr1));*/
//九、举例说明字符串格式化函数函数的应用
/*$number = 112.321342;
printf($number,'%%');echo "<br>";
printf('%b',$number);echo "<br>";
printf('%c',$number);echo "<br>";
printf('%d',$number);echo "<br>";
printf('%e',$number);echo "<br>";
printf('%0.3f',$number);echo "<br>";
printf('%s',$number);echo "<br>";
printf('%o',$number);echo "<br>";
printf('%x',$number);echo "<br>";*/
//十、举例说明字符串其它函数的应用
/*$str8 = "gao deng xue xiao jian gon chan kao ";
$str9 = "lmn  ";
//返回字符串的长度
echo strlen($str8)."<br>";
//字符串重复指定地次数
echo str_repeat($str9,4)."<br>";
//随机的打乱字符串中所有的字符
echo str_shuffle($str8)."<br>";
//翻转字符串
echo strrev($str8);*/
//十一、写出一个可以列举出任意两个数之间所有回文数的函数,返回值为数组
/*   function hw($x,$y){
    //遍历
        for ($i = $x; $i <= $y; $i++){
            if($i == strrev($i)){
                $arr[] = $i;
            }
        }
        return $arr;
    }
    print_r(hw(1,1000));*/
//十二、写出一个可以返回指定长度随机字符串的函数
//1纯数字 2纯小写字母 3纯大写字母 4大小写混合 5大小写加数字 6汉字 7混元体
    function a1($length){
        $str = join('',range(0,9));
        return substr(str_shuffle($str),0,$length);
    }
    function a2($length){
        $str = join('',range("a","z"));
        return substr(str_shuffle($str),0,$length);
    }
    function a3($length){
        $str = join('',range("A","Z"));
        return substr(str_shuffle($str),0,$length);
    }
    function a4($length){
        $str = join('',array_merge(range("a","z"),range("a","z")));
        return substr(str_shuffle($str),0,$length);
    }
    function a5($length){
        $str = join('',array_merge(range(0,9),range("a","z"),range("A","Z")));
        return substr(str_shuffle($str),0,$length);
    }
    function a6($length,$str){
        $arr = str_split($str,3);
        shuffle($arr);
        return mb_substr(join('',$arr),0,$length,"utf-8");
    }
    function huidiao($type,$length,$str = '减放个公积金阿尔朴槿惠熬过来哈饿哦日后阿里和爱'){
        $type = "a".$type;
        return $type($length,$str);
    }
    echo huidiao(6,4);
    /*function a7($length){
        $str = join('',range(0,9));
        return substr(str_shuffle($str),0,$length);
    }*/

//十三、写出三个能够获取文件后缀名的函数
//  如：abc.txt.jpg.doc.php   返回后缀名为php
/*$str0 = "abc.txt.jpg.doc.php";
//第一种
echo ltrim(strrchr($str0,'.'),'.')."<br>";

//第二种
$arr2 =explode('.',$str0);
echo end($arr2)."<br>";

//第三种
$str9 =strrev($str0);
$a = strpos($str9,'.',0);
echo strrev(substr($str9,0,$a));*/