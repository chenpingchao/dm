<?php
header("Centent-Type:text/html;charset:utf-8;");
//选择要连接的服务器
@$connect = mysql_connect('127.0.0.1:3306','root','root');
//选则要操作的数据库
mysql_select_db("hyb");
//设置数据库的汉字编码
mysql_set_charset('utf8');
//接受请求的id
$id = $_GET['id'];

//查询数据库sql语句
//$sql = "select id,usename from member where id=$id";
$sql = "select id,usename from member where id=$id";
//执行语句，获取资源
$result = mysql_query($sql);

//对资源进行处理
$member = mysql_fetch_assoc($result);

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input{
            margin:20px;
            line-height:2em;
        }
    </style>
</head>
<body>
<pre>
<form action="formMySol.php?zxc=new" method="post">
    <input type="hidden" name="id" value="<?php echo $member['id']?>">
    <h1>更改密码</h1>
    <input type="text" disabled value="<?php echo $member['usename']?>">
    <input type="password" name="oldpassword">
    <input type="password" name="newpassword">
    <input type="password" name="newpassword1">
    <input type="submit" value="确认提交">

</form>
</pre>
</body>
</html>
