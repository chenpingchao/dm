<?php
require_once "../../conf.inc.php";
include_once "../public/page.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}

$order_status = isset($_GET['order_status'])?$_GET['order_status']:100;
$order_syn = isset($_GET['order_syn'])? trim($_GET['order_syn']):'';
//搜索功能  判断用户名是否为空
if(empty($order_syn)){
    $where = $order_status==100 ?"where mid={$_SESSION['mid']}":"where mid={$_SESSION['mid']} and status=".$order_status;
    $w = "&order_status=".$order_status;
}else{
    $where = "where order_syn  id={$_SESSION['mid']} and like '%".$order_syn."%'";
    $where .= ($order_status==100?'':" and status=".$order_status);
    $w = "&order_syn=".$order_syn."&order_status=".$order_status;
}

/*echo $where;
exit;*/
//分页功能的实现
//每页显示记录的条数
$pageNum = 5;
//查询出来的记录的总数
$resoult = oneSelect("select count(id) from orders $where");
$total = $resoult["count(id)"];


//当前页的页码
$curPage = isset($_GET['page'])?$_GET['page']:1;
//exit;
//每一页的第一条的条数、
$firstPage = ($curPage-1)*$pageNum;
//0  0123  第一页
//1  4567  第二页
//2  89    第三页
//设置固定显示的几个页码
$showPage = 6;

//查询表中所有的信息
$order_arr = moreSelect("select * from orders $where limit $firstPage,$pageNum");
//
//dd($order_arr);
//dd($total);
//exit();
$page = page($total,$curPage,$pageNum,$showPage,$w)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心-我的订单</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
<link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" rev="stylesheet" href="<?php echo HOME_SKIN?>css/membercenter.css" />
<style type="text/css">
a:hover{ text-decoration:none; color:#00A3EC!important;}
.infoul{text-align:center; padding:20px;}
.infoul li{ float:left;width:40%; margin:0 3% 0; margin-bottom:40px; height:110px; border:1px solid #ddd; padding:20px 0; background:#F6F6F6}
.infoul li p.infotime{font-size:16px;}
.infoul li .infodetail{ text-align:right; padding-right:20px;}
.infoul li .infodetail a{ font-size:14px; color:#0093DD}
.infotime{ height:40px; line-height:40px;}
.infomoney{ font-size:26px; font-weight:700;}
.news{ margin:10px; border:1px solid #0093DD; padding-bottom:10px;}
.news h1{padding: 10px 20px 0;}
.news h1 a{font-size:16px; font-weight:700;}
.news strong{ padding:5px 20px; display:block; color:#444;}
.news p{ padding:0 20px;}
.news h2{ font-size:18px; padding:8px 10px; border-bottom:1px solid #EEF2FB; background:#00A3EC; color:#fff; font-weight:700;}

</style>
</head>
<body>
<div class="buyer_day">	
	<p class="select_title"><span>我的订单</span></p>
	<div class="day_select">
		<form action="">
            <p class="day_time02">
                <label>订单号:</label>
                <input type="text" name="order_syn" placeholder="请输入要查询的订单号"/>
                <label>订单状态:</label>
                <select name="order_status">
                    <option value="100">全部订单</option>
                    <option value="1">待付款</option>
                    <option value="2">待发货</option>
                    <option value="3">待收货</option>
                    <option value="4">已完成</option>
                </select>
                <button  class="selbtn01" value="搜索">搜索</button>
            </p>
    	</form>
	</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
		<thead>
			<tr>
				<th class="xuhao"></th>
				<th class="username">时间</th>
				<th class="userlogin">订单号</th>			
				<th class="usertime">订单状态</th>
				<th class="userip">成交金额</th>
				<th class="websort">操作</th>
			</tr>
		</thead>
		<tbody id="pageBody">
        <?php
        if($order_arr){
            foreach($order_arr as $v){
        ?>
			<tr>
                <td class="xuhao" style="color: #ff0000"><?php echo  ++$firstPage?></td>
                <td class="username"><?php echo $v['add_time']?></td>
                <td class="userlogin"><a href="orderdetail.html"><?php echo $v['order_syn']?></a></td>
                <td class="usertime"><?php echo $member_orders[$v['status']]?></td>
                <td class="userip"><?php echo $v['order_price']?></td>
                <td class="websort">
                    <?php
                    switch ($v['status']){
                        case 1:
                            echo "<a href='moneypay.php?id={$v['id']}'>去付款</a>";
                            break;
                        case 3:
                            echo "<a href='orderAction.php?act=over&oid={$v['id']}'>确认收货</a>";
                            break;
                    }
                    ?>
                </td>
            </tr>
        <?php
            }
        }
        ?>
		</tbody>
	</table>

		  <div style="clear:both;"></div>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo $total?></i>条记录，当前显示第&nbsp;
            <i class="blue"><?php echo $curPage ?>&nbsp;</i>页</div>
        <?php echo $page?>
    </div>
</div>
</body>
</html>
