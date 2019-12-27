<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a{
            color: #aaaaaa;
        }
        img{
            width:50px;
        }
    </style>
</head>
<body>
<h2>淘宝首页</h2>
<?php
if(isset($_SESSION['mid'])){
?>
    <img src="<?php echo isset($_SESSION['avter'])?$_SESSION['avter']:'none.jpg'?>" alt="">
    <h4><?php echo $_SESSION['username'] ?></h4>
    <h4><a href="varify.php?act=delete">登出</a></h4>

<?php
}else {
?>
    <h4><a href="register.php">你好！请登录</a></h4>
<?php
}
?>


</body>
</html>
