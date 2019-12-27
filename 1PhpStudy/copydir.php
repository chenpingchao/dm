<?php
header("Content-type:text/html;charset=utf-8");
function copydir($old,$new){
//    判断目录是否存在
    if(!file_exists($new)) {
//        创建新目录
        mkdir($new);
    }
    //对原目录进行检查

    //打开目录句柄
    $handle = opendir($old);

    //读取目录
    while($name = readdir($handle)){
        //判断目录是否为.或..
        if($name != '.' && $name != '..' ){
            $filepath = $old.'/'.$name;
            //判断是文件还是目录
            if(is_file($filepath)){
               copy($filepath,$new.'/'.$name);
            }else{
                copydir($filepath,$new.'/'.$name);
            }
        }
    }

//    closedir($handle);
}
//调用函数
copydir('D:/xxzl/dm','E:/dm');


var_dump(is_file('D:/xxzl/dm/.idea/deployment.xml'));


