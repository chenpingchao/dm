<?php
require_once('sqlconnect.php');
$id =$_GET['id'];
//查询信息
$sql = "select * from yh_cate where id=$id";
$resource_cate = mysql_query($sql);
$cate_arr = mysql_fetch_assoc($resource_cate);

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
<form action="cateCURD.php?act=update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $cate_arr['id']?>">
    <input type="text" name="catename" value="<?php echo $cate_arr['catename']?>">
    <input type="submit" value="确认更改">
</form>

</body>
</html>
