<?php
include_once "../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:../index.php");
}
$mid = $_SESSION['mid'];
$member = oneSelect("select username from zk_member where id=$mid")
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
   <form action="../msg/Action.php?act=update_use" method="post">
   <dl>
       <dt>更改信息</dt>
       <dd>
           <label for="username">用&ensp;户&ensp;名：</label>
           <input type="text" name="username" id="username" value="<?php echo $member['username']?>" placeholder="4-10位字母、数字、下划线">
       </dd>
       <dd>
           <label for="password">原&ensp;密&ensp;码：</label>
           <input type="password" name="oldpwd" id="password"  placeholder="6-15位非空白字符">
       </dd>
       <dd>
           <label for="password">新&ensp;密&ensp;码：</label>
           <input type="password" name="password" id="password"  placeholder="6-15位非空白字符">
       </dd>
       <dd>
           <label for="repwd">确认密码：</label>
           <input type="password" name="repwd" id="repwd" placeholder="请输入确认密码">
       </dd>
       <dd>
           <button>更   新</button>
           <div class="ask">
               <a href="../msg/list.php">取消修改</a>
           </div>
       </dd>
   </dl>
   </form>
</div>
</body>

</html>