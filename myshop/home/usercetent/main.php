<?php
    require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}

//查询该用户的信息
$member = oneSelect("select money,score from member where id=".$_SESSION['mid']." limit 1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心首页</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<link type="text/css" rel="stylesheet" rev="stylesheet" href="<?php echo HOME_SKIN?>css/membercenter.css" />
<style type="text/css">
  .container{width:600px;padding:25px;}
  .container div.welcome{margin-bottom: 30px;font-size: 16px;}
  .container div{line-height: 2.5em;font-size: 14px;}
  .container div span{color:red;font-weight: bold;padding: 0 5px;}
  a{color:#00A3EC;font-size: 14px;}
</style>
</head>
<body>
<div>	
	<p class="select_title"><span>用户中心首页</span></p>
</div>
<div class="container">
     <div class="welcome" >
        <span><?php echo $_SESSION['mname']?></span>，欢迎您回到云和商城用户中心!
     </div>

     <div>
        您的账户余额：&yen;<span><?php echo $member['money']?></span>元
     </div>

     <div>
        您的用户积分：<span><?php echo $member['score']?></span>分
     </div>

     <div>
        您共有<span>2</span>个未完成订单需要处理
     </div>
</div>

</body>
</html>
