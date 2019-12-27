<?php
    require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顶部页面</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<head>
<style type="text/css">
*{padding:0;margin: 0}
img{border: 0 none;}
.head{width: 100%; height: 70px;line-height:70px;}
.head .hleft{width:260px;height:50px;float: left;padding: 10px 0 10px 10px;}
.head .hright{float: right;text-align: right;text-align: left;padding-right: 10px;}
.hright font,.hright a{font:14px "微软雅黑",Arial,Verdana,"宋体";color:#494949;}
.hright a:hover{color:#FA2800}
</style>
</head>
<body>
<div class="head">
	<div class="hleft"><a href="/" target="_parent"><img src="<?php echo HOME_SKIN?>images/centerlogo.png"/></a></div>
	<div class="hright"><font>欢迎您 <span style="color:red;padding:0 5px;"><?php echo $_SESSION['mname']?></span></font><span style="padding: 0 10px;">|</span>
        <a href="../member/memberAction.php?act=logout" target="_parent" onClick="logout();">退出</a></div>
</div>
</body>
</html>