<?php 
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>顶部</title>
    <link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
</head>
<body style="background:url(<?php echo ADMIN_SKIN?>images/topbg.gif) repeat-x;">
    <!-- 左侧 -->
    <div class="topleft">
        <a href="index.php" target="_parent"><img src="<?php echo ADMIN_SKIN?>images/logo.png" title="系统首页" /></a>
    </div>
     <!-- 右侧 -->
    <div class="topright">    
        <ul>
           
            <li>
                <a href="/" target="_parent">前台首页</a>
            </li>
            <li>
                <a href="../admin/loginAction.php?act=logout" target="_parent">退出</a>
            </li>
        </ul>
                 
        <div class="user">
            <span><?php echo $_SESSION['aname']?></span>
            <i> </i>
           
        </div>       
    </div>
</body>

</html>
