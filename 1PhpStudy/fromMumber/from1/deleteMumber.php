<?php
//链接服务器
@$connect = mysql_connect('127.0.0.1:3306','root','root');
//选择要操作的数据库
mysql_select_db('hyb');
//设置数据库的汉字编码
mysql_set_charset('utf8');
//查询数据库sql语句
$sql = "select * from member";
//执行sql语句
$result = mysql_query($sql);
//抽取资源中的记录，一次抽一条，组成二维数组
while($a = mysql_fetch_assoc($result)){
    $mumber[] = $a;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="formMySql.html">添加会员</a>
<table width="600px" cellspacing="0" cellpadding="8px" border="1px" rules="both">
    <caption><h1>会员注册表</h1></caption>
    <tr>
        <td>编号</td>
        <td>ID</td>
        <td>用户名</td>
        <td>注册时间</td>
        <td>操作</td>
    </tr>
    <?php
//    判断资源的数量
        if($result && mysql_num_rows($result)>0){
           //遍历二维数组中的记录
            foreach($mumber as $k => $v){
    ?>
                <tr>
                    <td><?php echo $k+1 ?></td>
                    <td><?php echo $v['id']?></td>
                    <td><?php echo $v['usename']?></td>
                    <td><?php echo $v['addTime'] ? date('Y-m-d H:i:s'): ''?></td>
                    <td>
                        <a href="formMySol.php?zxc=delete&id=<?php echo $v['id']?>">删除</a>
                        <a href="newpassword.php?id=<?php echo $v['id']?>">更改密码</a>
                    </td>
                </tr>
    <?php
            }
        }
    ?>
</table>

</body>
</html>
