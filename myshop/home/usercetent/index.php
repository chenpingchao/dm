<?php
    require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-用户中心</title>
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/index.css">
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/shopcart.css">
</head>
<body>
<!--  头部开始 -->
	<div class="box">
		<iframe name="topFrame" src="membertop.php" frameborder="0" width="1200" height="70" scrolling="no"></iframe>		
	</div>
	<div style="width:100%;height:3px;background-color:#ccc;"></div>
<!-- 头部结束 -->
<div class="box main">
	<div class="lf">
		<iframe name="leftFrame" src="memberleft.php" frameborder="0" width="195" height="1000" scrolling="no"></iframe>
	</div>
	<div class="rf">
		<iframe name="main" src="main.php" frameborder="0" width="1000"  height="1000" scrolling="no"></iframe>
	</div>

</div>
</div>
<div style="clear:both;"></div>
<!-- 尾部开始 -->
	<div class="footer">

			<p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
			<p>版权所有：河南云和数据信息技术有限公司</p>
			<p>© CopyRight2016 All rights reserved.</p>
			<p>豫ICP备14003305号</p>
	</div>
	<div style="clear:both;"></div>
<!-- 尾部结束 -->

</body>

</html>