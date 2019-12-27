<?php
require_once "../../conf.inc.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>易购网-用户注册</title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/register.css">
</head>
<body>
<!--  头部开始 -->
<div class="header">
    <div class="box logoBar">
        <div class="logo lf">
            <a href="/"><img src="<?php echo HOME_SKIN ?>images/logo.png"></a>
        </div>
        <div class="reg lf">
            | <span>用户注册</span>
        </div>
    </div>
    <hr class="headLine"/>
</div>
<!-- 头部结束 -->
<!-- 注册表单开始 -->
<div class="box">
    <div class="regArea">
        <div class="regLeft lf">
            <img src="<?php echo HOME_SKIN ?>images/reg.png"/>
        </div>
        <div class="regRight lf">
            <form action="memberAction.php?act=add" method="post">
                <table border="0">
                    <tr>
                        <td><label>用户名：</label></td>
                        <td>
                            <input type="text" name="username" id="username" placeholder="请输入用户名" onblur="chkUsername()"
                                   onfocus="usernameRule();"/>
                            <div></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>密码：</label></td>
                        <td>
                            <input type="password" name="password" id="pwd" placeholder="请输入密码" onblur="chkPwd()"/>
                            <div></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>确认密码：</label></td>
                        <td>
                            <input type="password" name="repwd" id="repwd" placeholder="请再次输入密码"/>
                            <div></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>验证码：</label></td>
                        <td>
                            <input type="text" name="captcha" class='yzm' id="yzm"/>
                            <img src="../../public/captcha.php"
                                 onclick="this.src='../../public/captcha.php?num='+Math.random()" class='yzmImg'/>
                        </td>
                    </tr>
                    <tr id="protocol">
                        <td colspan="2">
                            <input type="checkbox" checked name="protocol" value="1" id="myprotocol" style="width:1em;"/>
                            <span>我已阅读并同意</span> <a href="#">用户服务协议</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="loginTd">
                            <a class="loginBtn" id="a">注册</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="tologin">
	  		   					<span>
	  		   					您已注册账号？请立即 <a href="login.php">登录</a>
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
<script>
    document.getElementById('a').onclick = function () {
        document.getElementsByTagName('form')[0].submit();
    }
</script>
</html>

