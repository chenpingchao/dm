<?php

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
        dt,dd{
            line-height:2.5em;
        }
    </style>
</head>
<body>
    <form action="varify.php?act=logoin" method="post">
    <dl>
            <dt>用户登录</dt>

        <dd>
            <label for="username">用户名：</label>
            <input type="text" name="username" id="username">
        </dd>
        <dd>
            <label for="password">密&emsp;码：</label>
            <input type="password" name="password" id="password">
        </dd>
        <dd>
            <label for="capcha">验证码：</label>
            <input type="text" name="captcha" id="capcha">
            <img src="../../workDay12/back.php" onclick="this.src='../../workDay12/back.php?num='+Math.round()">
        </dd>
        <dd>
            <input type="submit" value="登录">
        </dd>
    </dl>
    </form>
</body>
</html>
