<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

$order_status = isset($_GET['order_status'])?$_GET['order_status']:100;
$order_syn = isset($_GET['order_syn'])? trim($_GET['order_syn']):'';
//搜索功能  判断用户名是否为空
if(empty($order_syn)){
    $where = $order_status==100 ?"":"where status=".$order_status;
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
$pageNum = 2;
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

include_once "../../public/libs/page.inc.php";
$page = page($total,$curPage,$pageNum,$showPage,$w)

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员列表页</title>
    <link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ADMIN_SKIN?>css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/select-ui.min.js"></script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">管理员管理</a></li>
        <li><a href="#">管理员列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <!-- 搜索 -->
            <form action="?" >
            <ul class="seachform">
                <li>
                    <label>管理员搜索</label>
                    <input name="order_syn" type="text" value="<?php echo $order_syn? $order_syn :'' ?>" class="scinput" />
                </li>
                <li>
                    <label>指派</label>
                    <div class="vocation">
                        <select class="select3" name="order_status">
                            <option value="3" <?php echo $order_status==100?"selected" :''?>>全部</option>
                            <option value="1" <?php echo $order_status==1?"selected" :''?>>待付款</option>
                            <option value="2" <?php echo $order_status==2?"selected" :''?>>待发货</option>
                            <option value="3" <?php echo $order_status==3?"selected" :''?>>待收货</option>
                            <option value="4" <?php echo $order_status==4?"selected" :''?>>已完成</option>
                        </select>
                    </div>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input type="submit" class="scbtn" value="查询"/>
                </li>
            </ul>
            </form>
            <!-- 列表 -->
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="<?php echo ADMIN_SKIN?>images/px.gif" /></i></th>
                    <<th>时间</th>
                    <th>订单号</th>
                    <th>订单状态</th>
                    <th>成交金额</th>
                    <th>操作</th>
                </tr>
                </thead>
                <form action="adminAction.php?act=dels" method="post" id="form1">
                <tbody>
                <?php
                if($order_arr){
                    foreach ($order_arr as $k=>$v){
                ?>
                        <tr>
                            <td><?php echo ++$firstPage ?></td>
                            <td><?php echo $v['add_time']?></td>
                            <td><a href="orderdetail.html"><?php echo $v['order_syn']?></a></td>
                            <td><?php echo $member_orders[$v['status']]?></td>
                            <td><?php echo $v['order_price']?></td>
                            <td>
                                <?php
                                switch($v['status']){
                                    case 2 :
                                        echo "<a href='orderAction.php?act=delGoods&oid={$v['id']}'>发货</a>";
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }else{
                ?>
                    <tr>
                        <td><h3>没有找到管理员的信息</h3></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
                </form>
            </table>

            <!-- 分页 -->
            <div class="pagin">
                <div class="message">共<i class="blue"><?php echo $total?></i>条记录，当前显示第&nbsp;
                    <i class="blue"><?php echo $curPage ?>&nbsp;</i>页</div>
                <?php echo $page?>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({
            width : 345
        });
        $(".select2").uedSelect({
            width : 167
        });
        $(".select3").uedSelect({
            width : 100
        });
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    });

//复选按钮
    var chkall = document.getElementsByName('chkall')[0];
    var chk = document.getElementsByName('chk[]');
//全选
    chkall.onclick = function(){
        for(var i=0;i<chk.length ; i++){
            chk[i].checked= chkall.checked;
        }
    };
    //保证全选的准确
    function chkon(){
        var num = 0;
        for(var i=0; i<chk.length ;i++){
            if(chk[i].checked){
                num++;
            }
        }
        if(num == chk.length){
            chkall.checked = true;
        }else{
            chkall.checked = false;
        }
    }

    //删除单个管理员
    function del(id){
        if(confirm('确认删除该管理员')){
            location = "adminAction.php?act=del&id="+id
        }
    }
    //批量删除管理员
    function dels(){
        if(confirm('确认批量删除管理员?')){
            document.getElementById('form1').submit();
        }
    }
</script>
</html>

