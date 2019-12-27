<?php
require_once "../../conf.inc.php";
//判断是否登录
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
$admin = oneSelect("select login_time,login_ip from admin where id={$_SESSION['aid']}");
/*var_dump("select login_add,login_ip from admin where id={$_SESSION['aid']}");
exit;*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台首页</title>
    <link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.js"></script>
</head>
<body>

	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
        </ul>
    </div>

    <div class="mainindex">
     
        <div class="welinfo">
            <b><?php echo $_SESSION['aname']?></b>，欢迎使用后台管理系统
        </div>
        
        <div class="welinfo">
            <span><img src="<?php echo ADMIN_SKIN?>images/time.png" alt="时间" /></span>
            <i>您上次登录的时间：<?php echo date('Y-m-d H:i:s',$admin['login_time'])?></i>
            <i>您上次登录IP：<?php echo $admin['login_ip']?></i> 如非本人操作，请及时
            <a href="../admin/update.php?id=<?php echo$_SESSION['aid']?>">更改密码</a>
        </div>
        
        <div class="xline"></div>
        <div class="box"></div>
        
        <div class="welinfo">
            <span><img src="<?php echo ADMIN_SKIN?>images/dp.png" alt="提醒" /></span>
            <b>服务器信息</b>
        </div>
        
        <ul class="infolist">
            <li><span>服务器环境：</span>Apache PHP</li>
            <li><span>服务器地址：</span>127.0.0.1</li>
            <li><span>服务器地址：</span>www.xxxxxx.com</li>
            
        </ul>
        
        <div class="xline"></div>
        
        <div class="uimakerinfo">
            <b>版权所有：云和商城</b>(<a href="http://www.yhshop.com" target="_blank">www.yhshop.com</a>)
        </div>
    </div>
    
</body>
</html>
