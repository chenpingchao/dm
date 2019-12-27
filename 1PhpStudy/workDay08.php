<?php
//二、举例说明元字符 | 的作用
/*$str1 = "a1 a2 b3 b4 c5 c6 ";
$regex1 = '/a|b/';
preg_match_all($regex1,$str1,$arr1);
echo "<pre>";
print_r($arr1);
echo "<pre>";*/
//三、举例说明元字符 []  [^]  [-]的作用
/*$str2 = "a1 a2 a3 a4 c5 c6 ";
//$regex2 = '/\w[1-5]/';
//$regex2 = '/a[^1]/';
//$regex2 = '/a[12]/';
preg_match_all($regex2,$str2,$arr2);
echo "<pre>";
print_r($arr2);*/
//四、举例说明元字符 \d \D \s \S \w \W . 的含义
/*$str3 = "a1 #$%^&*( b3_b4 c5_c6 d8 d9 r20 r21  ";
//$regex3 = '/\d+/';//匹配0-9之间的数字
//$regex3 = '/\D+/';//匹配除0-9之外的任意字符
//$regex3 = '/\s+/';//匹配一个空白字符
//$regex3 = '/\S+/';//匹配一个非空白字符
//$regex3 = '/\w+/';//匹配一个任意的数字，大小写字母和下划线
$regex3 = '/\W+/';//匹配一个任意的数字，大小写字母和下划线
preg_match_all($regex3,$str3,$arr3);
echo "<pre>";
print_r($arr3);
echo "<hr>";*/
//五、举例说明原子数量限定符{n} {n,}{n,m} + * ?的含义
/*//{n}前面的原子连续出现n次
$str = "a1 aa2 a232 aa324 b45 764 35 234 234";
$regex = '/\d{3}/';
preg_match_all($regex,$str,$arr);
echo "<pre>";
print_r($arr);
//{n,}其3前面的原子至少出现n次
$str1 = "a1 aa2 a232 aa324 b45 764 35 234 234";
$regex1 = '/\d{2,}/';
preg_match_all($regex1,$str1,$arr1);
echo"<pre>";
print_r($arr1);
//{n,m}其前面的原子连续出现n到m次；
$str2 = "a1 aa2 a232 aa32214 b452 7313264 2132135 23234 22334";
$regex2 = '/\d{2,4}/';
preg_match_all($regex2,$str2,$arr2);
echo "<pre>";
print_r($arr2);
/其前面的原子至少出现0次
$str3 = "a1 aa2 a232 ";
$regex3 = '/[2]';
preg_match_all($regex3,$str3,$arr3);
echo "<pre>";
print_r($arr3);
//+其前面的原子至少出现1次相当于{1,}
$str4 = "a1 aa2 a232 aa324 b45 764 35 234 234";
$regex4 = '/a2+/';
preg_match_all($regex4,$str4,$arr4);
echo "<pre>";
print_r($arr4);
//?其前面的原子出现1次或0次，相当于｛0，1｝
$str5 = "a1 aa2 a232";
$regex5 = '/(a232)?/';
preg_match_all($regex5,$str5,$arr5);
echo "<pre>";
print_r($arr5);*/
//六、举例说明贪婪匹配和非贪婪匹配的区别
/*//贪婪匹配
$str = "a23232323";
$regex = '/a\d+/';
preg_match_all($regex ,$str,$arr);
echo"<pre>";
print_r($arr);
//非贪婪匹配
$str = "a23232323";
$regex = '/a\d+?/';
preg_match_all($regex ,$str,$arr);
echo"<pre>";
print_r($arr);*/
//七、举例说明边界控制符^和$的作用
/*$str = "fg23232323";
$regex = '/^a\w+/';
preg_match_all($regex ,$str,$arr);
echo"<pre>";
print_r($arr);
$str = "fg23232323asd";
$regex = '/\w+\d$/';
preg_match_all($regex ,$str,$arr);
echo"<pre>";
print_r($arr);*/
//八、举例说明单词边界符\b和\B的作用
/*//边界符\b
$str = "this is island his island history";
$regex = '/is\b\w+/';
//$regex = '/\w+is\b/';
//$regex = '/\w+\bis/';
//$regex = '/\bis\w+/';
preg_match_all($regex,$str,$arr);
echo "<pre>";
print_r($arr);*/
//非单词边界\B
$str = "this is island his island history";
$regex = '/\w+is\B\w+/';
preg_match_all($regex,$str,$arr);
echo "<pre>";
print_r($arr);
//九、举例说明子模式单元()有哪些作用
/*$str = "This varyvary good ,vary butilitful ";
$regex = '/(vary)+/';
preg_match_all($regex,$str,$arr);
echo"<pre>";
print_r($arr);*/

//十、举例说明模式修正符 i的作用
/*$str = "THIS IS island his island";
$regex = '/\w*is*\w+/i';
preg_match_all($regex , $str,$arr);
echo"<pre>";
print_r($arr);*/
//十一、举例说明模式修正符s的作用
/*$str = "a jfwije
werjw123213";
$regex = '/^a.*\d+$/s';
preg_match_all($regex,$str,$arr);
echo"<pre>";
print_r($arr);*/
//十二、举例说明模式修正符x的作用
/*$str = "this is a apple ,it is vary big";
$regex = '/\w+i   s/x';
preg_match_all($regex,$str,$arr);
echo"<pre>";
print_r($arr);*/
//十三、举例说明模式修正符U的作用
/*$str = "asd123123123";
$regex = '/asd\d+/';
$regex1 = '/asd\d+/U';
preg_match_all($regex,$str,$arr);
preg_match_all($regex1,$str,$arr1);
echo "<pre>";
print_r($arr);
print_r($arr1);*/
//十四、举例说明模式修正符m的作用
/*$str = "kjsd kjdsf fsd lijsn  fnklsdj kfja wj";
$regex = '/\w+/m';
preg_match_all($regex,$str,$arr);
echo "<pre>";
print_r($arr);*/




// IP地址
/*$str1 = "155.233.40.133  qw1.323.43.245";
$regex1 = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
preg_match_all($regex1 , $str1 , $arr1 );
echo "<pre>";
print_r($arr1);
echo "<hr>";

//qq号
$str2 = "21332132  4665546  6546  6546  6546316464891";
$regex2 = '/\d{6,11}/';
preg_match_all($regex2 , $str2 ,$arr2);
echo "<pre>";
print_r($arr2);
echo "<hr>";

//uRL地址
$str3 = "https://mail.sina.com.cn/ https://www.foxmail.com/ ";
$regex3 = '/(\.\w+)+/x';
preg_match_all($regex3 , $str3,$arr3);
echo"<pre>";
print_r($arr3);
echo "<hr>";

//非空
$regex2 = '/\S/';

//邮箱
$str4 = "sfdajgj@ffd.com efsf@sa.com.cn";
$regex4 = '/\w+@\w+(\.\w+)+/';
preg_match_all($regex4 , $str4,$arr4);
echo"<pre>";
print_r($arr4);
echo "<hr>";

//手机号
$str5 = "13132123345";
$regex5 = '/^1[35789]\d{9}$/';
preg_match_all($regex5 , $str5,$arr5);
echo"<pre>";
print_r($arr5);
echo "<hr>";

//汉字

//以字母开头包含字母、数字、下划线的用户名
$str7 = "rtyrts tsryhkop rsltjyposhr srtyk ";
$regex7 = '/[a-zA-Z]\w+/';
preg_match_all($regex7 , $str7,$arr7);
echo"<pre>";
print_r($arr7);
echo "<hr>";

//身份证号
$str7 = "123456789012345 123456789021345678 12345678901234567X ";
$regex7 = '/\d{15}(\d{2}[\dX])?/';
preg_match_all($regex7 , $str7,$arr7);
echo"<pre>";
print_r($arr7);
echo "<hr>";*/