<?php
//一、举例说明如何获取文件类型
//echo filetype('workDay5.php');
//二、举例说明如何判断文件是否是目录
/*echo is_dir('mumber');
echo is_dir('af.php');*/
//三、举例说明如何判断文件是否是普通文件
/*var_dump(is_file('af.php'));
var_dump(is_file('.ider'));*/
//四、举例说明如何判断文件是否存在
/*var_dump(file_exists('think.php'));
var_dump(file_exists('thi.php'));*/
//五、如何获取文件大小？封装一个函数，以B、K、M、G、T单位来返回文件大小
/*function size($size){
    if($size>pow(2,40)){
        return round($size/pow(2,40)).'TB';
    }else if($size>pow(2,30)){
        return round($size/pow(2,30)).'GB';
    }else if($size>pow(2,20)){
        return round($size/pow(2,20)).'MB';
    }else if($size>pow(2,10)){
        return round($size/pow(2,10)).'KB';
    }else{
        return $size.'B';
    }
}
echo size(filesize('D:\xxzl\video\JavaScript\8 DOM-4.ASF'));*/
//六、如何获取文件创建时间、修改时间、访问时间
/*//创建时间
echo date('Y-m-d H:i:s',filectime('af.php')).'<br>';
//修改时间
echo date('Y-m-d H:i:s',filemtime('af.php')).'<br>';
//访问时间
echo date('Y-m-d H:i:s',fileatime('af.php')).'<br>';*/
//七、如何获取当前文件绝对路径
/*echo realpath('workDay10.php');*/
//八、举例说明basename()、dirname()、pathinfo()、realpath()函数的作用以及用法
/*//basebname 返回路径中的文件名部分
echo basename('D:\xxzl\dm\1PhpStudy\workDay10.php').'<br>';
echo basename('D:\xxzl\dm\1PhpStudy\workDay10.php','.php').'<br>';
//dirname  返回路径中的目录部分
echo dirname('D:\xxzl\dm\1PhpStudy\workDay10.php').'<br>';
//pathinfo  返回文件路径信息 （数组）
echo '<pre>';
print_r(pathinfo('D:\xxzl\dm\1PhpStudy\workDay10.php'));
echo '</pre>';
//realpath   返回规范化的绝对路径名
echo realpath('workDay10.php');*/
//九、操作目录需要哪三个步骤?封装一个可以遍历目录以及子目录下所有文件的函数
/*//opendir --打开目录句柄、
var_dump($a = opendir('mumber'));
echo '<br>';
//readdir --从目录句柄中读取条目
var_dump(readdir($a));
echo '<br>';
//closedir --关闭目录句柄
var_dump(closedir($a));*/
    //封装遍历目录及子目录所有文件的函数
/*function featch($dir){
    if(is_dir($dir)){
        //打开文件夹，获得资源
        $handle = opendir($dir);
        //判断资源条数并抽取
        while($name = readdir($handle)){
            //判断资源是不是.或..
            if($name != '.' && $name != '..'){
                //拼接资源URL
                $filepath = $dir.'/'.$name;
                //判读资源是文件还是文件夹
                if(is_dir($filepath)){
                    featch($filepath);
                }else{
                    echo $name."<br>";
                }
            }
        }
    }else{
        return $dir;
    }
}
//调用函数
featch('D:\xxzl\dm\teacher\php');*/
//十、如何统计目录所在磁盘剩余空间大小？如何统计目录所在磁盘总空间大小？
/*echo size(disk_free_space('mumber')).'<br>';
echo size(disk_total_space('mumber'));*/
//十一、如何新建目录、删除空目录
/*var_dump(mkdir('111'));
var_dump(rmdir('111'));*/
//十二、如何创建文件、删除文件
/*    var_dump(touch('213.text'));
    var_dump(unlink('nan.php'));*/
//十三、封装删除非空目录的函数
/*function deleteNoEmpyDir($url){
    //打开目录
    $handle = opendir($url);
    //读取目录条目并判断目录数目
    while($name = readdir($handle)){
        //判断抽取的是不是.或..
        if($name != '.' && $name != '..'){
            //拼接文件地址
            $filepath  = $url.'/'.$name;
            //判断是文件还是目录
            if(is_file($filepath)){
                unlink($filepath);
            }else{
                deleteNoEmpyDir($filepath);
            }
        }
    }
    closedir($handle);
    rmdir($url);
}
deleteNoEmpyDir('E:\dm');*/
//十四、如何复制文件、重命名文件、移动文件
/*//复制文件
var_dump(copy('think.php','mumber/think1.php'));
//移动文件
var_dump(rename('mumber/think1.php','think1.php'));
//重命名文件
var_dump(rename('think1.php','nan.html'));*/
//十五、封装复制目录的函数
/*function copyDir($old,$new){
    //判断目标是否存在此目录
    if(!file_exists($new)){
        //创建新目录
        mkdir($new);
        //打开原目录，获取资源
        $handle = opendir($old);
        //检查资源是否存在并抽取资源
        while($name = readdir($handle)){
            //判断名称是否为.或..
            if($name != '.' && $name != '..'){
                //拼接资源地址
                $filepath = $old.'/'.$name;
                //判断为文件还是目录
                if(is_dir($filepath)){
                    copyDir($filepath,$new.'/'.$name);
                }else{
                    copy($filepath,$new.'/'.$name);
                }
            }
        }
    }else{
        echo "<script>alert('此目录已存在')</script>";
    }
}copyDir('D:/xxzl/dm','E:/dm');*/
//十六、接要求完成下列操作：
/*//a)创建文件a.txt
var_dump(touch('11.txt'));echo "<br>";
//b)以a+方式打开a.txt
var_dump($handle = fopen('11.txt','a+'));echo '<br>';
//c)向a.txt中写入10行’hello world’
for($i=1 ; $i<=10 ; $i++ ){
    fwrite($handle,"hello world\n");
}
//d)关闭文件资源
var_dump(fclose($handle));echo "<br>";
//e)以r方式打a.txt
var_dump($handle = fopen('11.txt','r'));echo '<br>';
//f)读取全部10行内容
var_dump(fread($handle,100));echo "<br>";
//g)关闭文件资源
var_dump(fclose($handle));*/
//十七、举例说明file_get_contents()和file_put_contents()的用法
//readfile("http://www.baidu.com");
/* $str = file_get_contents("http://www.baidu.com");
echo $str;
file_put_contents('12.html',$str);*/