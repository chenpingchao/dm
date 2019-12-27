<?php
require_once "../../conf.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-用户登录</title>
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/register.css">
</head>
<body>
<!--  头部开始 -->
	<div class="header">
		<div class="box logoBar">
			<div class="logo lf">
				<a href="/"><img src="<?php echo HOME_SKIN?>images/logo.png"></a>
			</div>
			<div class="reg lf">
				|    <span>用户登录</span>
			</div>
		</div>
		<hr class="headLine" />
	</div>
<!-- 头部结束 -->
<!-- 注册表单开始 -->
   <div class="box">
	  	  <div class="regArea">
	  		   	<div class="regLeft lf">
	  		   		<img src="<?php echo HOME_SKIN?>images/login.png" />
	  		   	</div>
	  		   	<div class="regRight lf" style="height:300px">
                    <form action="memberAction.php?act=login" method="post" id="form1" >
	  		   		<table border="0">
	  		   			<tr>
	  		   				<td><label>用户名：</label></td>
	  		   				<td>
	  		   					<input type="text" placeholder="请输入用户名" name="username" />
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>密码：</label></td>
	  		   				<td><input type="password" placeholder="请输入密码" name="password"/></td>
	  		   			</tr>

	  		   			<tr>
	  		   				<td><label>验证码：</label></td>
	  		   				<td>
	  		   					<input type="text"  name="captcha" class='yzm' />
	  		   					<img src="/public/captcha.php"  class='yzmImg' onclick="this.src='/public/captcha.php?num='+Math.random()" />
	  		   				</td>
	  		   			</tr>

	  		   			<tr>
	  		   				<td colspan="2" id="loginTd">

	  		   				<a class="loginBtn" onclick="document.getElementById('form1').submit()">登录</a>
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td colspan="2" id="tologin">
	  		   					<span>
您还没有账号？请 <a href="add.php" >免费注册</a>
	  		   					</span>
	  		   					<span>
忘记密码？<a href="#" class="">找回密码</a>
	  		   					</span>
	  		   				</td>
	  		   			</tr>
	  		   		</table>
                    </form>
	  		   	</div>
	  	  </div>
   </div>
<!-- 注册表单结束 -->
<!-- 尾部开始 -->
	<div class="footer">
			<p>版权所有：河南云和数据信息技术有限公司</p>
			<p>© CopyRight2016 All rights reserved.</p>
			<p>豫ICP备14003305号</p>
	</div>
<!-- 尾部结束 -->

</body>

</html>