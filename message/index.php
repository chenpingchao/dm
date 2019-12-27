<?php
include_once "conf.inc.php";
if($_SESSION['mid']){
    header("location:msg/list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js"></script>
</head>
<body>
<div class="top">
    <div class="box">
        <img src="images/logo.jpg" alt="logo" class="lf logo">
    </div>
</div>
<div class="login"  style="height:370px">
   <form action="msg/Action.php?act=login" method="post" >
   <dl>
       <dt>欢迎登录</dt>
       <dd>
           <label for="username">用户名：</label>
           <input type="text" name="username" id="username" placeholder="请输入用户名">
       </dd>
       <dd>
           <label for="password">密&emsp;码：</label>
           <input type="password" name="password" id="password" placeholder="请输入密码">
       </dd>
       <dd>
           <label for="captcha">验证码：</label>
           <input type="text" name="captcha" id="captcha" placeholder="请输入右侧验证码">
           <img src="login/captcha.php" onclick="this.src='captcha.php?num='+Math.random()" alt="验证码">
       </dd>
       <dd>
           <button >登   录</button>
           <div class="ask">
               <span>您还没有账号?  </span>
               <a href="login/register.php">免费注册</a>
           </div>
       </dd>
   </dl>
   </form>
    <dl>
        <dd><button onclick="location = 'msg/list.php'">游&emsp;客</button></dd>
    </dl>

</div>
</body>
</html>