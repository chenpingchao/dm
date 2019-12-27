<?php
include_once "../conf.inc.php";
include_once "../libs/image.inc.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/login.js"></script>
</head>
<body>
<div class="login">
   <form action="../msg/Action.php?act=add" method="post">
   <dl>
       <dt>免费注册</dt>
       <dd>
           <label for="username">用&ensp;户&ensp;名：</label>
           <input type="text" name="username" id="username" value="<?php echo get_rand_str(5,7)?>" placeholder="4-10位字母、数字、下划线">
       </dd>
       <dd>
           <label for="password">密&emsp;&emsp;码：</label>
           <input type="password" name="password" id="password"  placeholder="6-15位非空白字符">
       </dd>
       <dd>
           <label for="repwd">确认密码：</label>
           <input type="password" name="repwd" id="repwd" placeholder="请输入确认密码">
       </dd>
       <dd>
           <label for="captcha">验&ensp;证&ensp;码：</label>
           <input type="text" name="captcha" id="captcha" placeholder="请输入右侧验证码">
           <img src="captcha.php" onclick="this.src='captcha.php?num='+Math.random()" alt="验证码">
       </dd>
       <dd>
           <button>注   册</button>
           <div class="ask">
               <span>您已有账号?  </span>
               <a href="../index.php">立即登录</a>
           </div>
       </dd>
   </dl>
   </form>
</div>
</body>

</html>