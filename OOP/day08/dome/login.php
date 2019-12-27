<?php
require_once "conf.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="loginAction.php">
    <label for="username">用户名</label>
    <input type="text" id="username" name="username">
    <label for="password">密&emsp;码</label>
    <input type="password" id="password" name="pwd">
    <button>提交</button>
</form>
</body>
</html>