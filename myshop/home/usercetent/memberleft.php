<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<script type="text/javascript" src="<?php echo HOME_SKIN?>js/jQuery.1.8.2.min.js"></script>
<style type="text/css">
	*{padding: 0;margin: 0;}
	ul,li{list-style: none;}
	img{border: 0;}
	html,body{height: 100%;}
	body{border-right: 1px solid #DFDFDF;background-color: #fefefe;font-family:Microsoft YaHei,Microsoft JhengHei,Arial; font-size:14px}
	a{color:#444;outline:none; font-size:14px}
	.leftBox{width:193px;color:#494949;}
	.leftBox h1{width: 194px;line-height:40px; cursor: pointer; font-weight:700; border-bottom:1px solid #d7e3ff}
	.leftBox h1.hover {background-color:none;}
	.leftBox h1.active {background-position: right 7px;}
	#container {width: 193px;}
	.content{width: 193px;}
	.type{background-color: #EEF2FB;background-image:url('<?php echo HOME_SKIN?>images/left.png');background-repeat: no-repeat; }
	.sum_foot{height:35px;line-height:35px; font-size: 12px;color: #6F6F6F;text-align: center;margin-top: 50px;border-top: 1px solid #DFDFDF}
	h1 a{display:block;width:133px;height:40px; text-decoration:none;moz-outline-style:none;line-height:40px;padding-left:60px}
	.MM li{font-size:14px;line-height:35px;color:#333;display:block;text-decoration:none;height:35px;width:193px;padding-left:0}
	.MM{width:193px}
	.MM a{font-size:12px;line-height:35px;color:#6f6f6f;height:35px;width:193px;display:block;text-align:center;overflow:hidden;text-decoration:none}
	.MM a:hover{line-height:35px;font-weight:bold;text-align:center;display:block;margin:0;padding:0;height:35px;width:194px;text-decoration:none;overflow:hidden;background-color:#fdf2ef;color:#cc0003;}
	.mma{background-color:#FDF2EF;font-weight:bold;}
	.mma a{color:#f00;}
	.city{ font-size:16px; background:#EEF2FB; text-align:center; padding:20px 0;}
	.city span{ font-size:20px; font-weight:700;}
</style>
</head>
<body>
<div class="leftBox" >
	<h1 class="city">
        <?php
        if(empty($_SESSION['avatar'])){
        ?>
            <div><img src="<?php echo HOME_SKIN?>images/avatar.jpg" alt="" style="border-radius:130px;width: 130px; "/></div>
        <?php
        }else{
         ?>
            <div><img src="/upload/<?php echo $_SESSION['avatar']?>" alt="" style="border-radius:130px;width: 130px;"></div>
        <?php
        }
        ?>
		<span><?php echo $_SESSION['mname']?></span>
	</h1>

	<h1 class="type" style="background-position:30px -30px;" >
		<a href="javascript:void(0)"  target="main">账户设置</a>
	</h1>
	<div class="content">
		<ul class="MM">
          <li><a href="../member/changeinfo.php" target="main">修改个人信息</a></li>
          <li><a href="../member/changepwd.php" target="main">修改账户密码</a></li>
          <li><a href="../member/paypwd.php" target="main">修改支付密码</a></li>
        </ul>
	</div>

	<h1 class="type" style="background-position:30px -112px;"  >
		<a href="javascript:void(0)">订单管理</a>
	</h1>
	<div class="content">
		<ul class="MM">
          <li><a href="../order/orderlist.php" target="main">全部订单</a></li>
          <li><a href="../order/orderlist.php?order_status=1" target="main">未付款订单</a></li>
          <li><a href="../order/orderlist.php?order_status=2" target="main">已付款订单</a></li>
          <li><a href="../order/orderlist.php?order_status=3" target="main">已发货订单</a></li>
          <li><a href="../order/orderlist.php?order_status=4" target="main">已完成订单</a></li>
        </ul>
	</div>
	
	<h1 class="type"  style="background-position:30px -198px;" >
		<a href="javascript:void(0)">购物车管理</a>
	</h1>
	<div class="content">
		<ul class="MM">
          <li><a href="../cart/mycart.php" target="_parent">我的购物车</a></li>
        </ul>
	</div>
    <p class="sum_foot">欢迎您回到易购网用户中心</p>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.leftBox h1:first').addClass('active');
		$('.leftBox .content:not(:first)').hide();
		$('.leftBox h1').hover(function(){
		$(this).addClass('hover');
		},function(){
		$(this).removeClass('hover');	
			});
		$('.leftBox h1').click(function(){
			$(this).next('.content').slideToggle()
					.siblings('.content').slideUp();	
			$(this).toggleClass('active')
					.siblings('h1').removeClass('active');
			$(".MM li").removeClass("mma");
			});
		$(".MM li").click(function(){
			$(this).addClass("mma").siblings().removeClass("mma");
		});
	});
</script>
</html>