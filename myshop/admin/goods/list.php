<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

$active = isset($_GET['active'])?$_GET['active']:3;
$goodsname = isset($_GET['goodsname'])? trim($_GET['goodsname']):'';
//搜索功能  判断用户名是否为空
if(empty($goodsname)){
    $where = $active==3 ?'':'where active='.$active;
    $w = "&active=".$active;
}else{
    $where = "where goodsname like '%".$goodsname."%'";
    $where .= ($active==3?'':" and active=".$active);
    $w = "&goodsname=".$goodsname."&active=".$active;
}

/*echo $where;
exit;*/
//分页功能的实现
//每页显示记录的条数
$pageNum = 5;
//查询出来的记录的总数
$resoult = oneSelect("select count(id) from goods $where");
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
$goods = moreSelect("select g.*,catename from goods as g left join category as c on g.cid=c.id  
 $where limit $firstPage,$pageNum");


include_once "../../public/libs/page.inc.php";
$page = page($total,$curPage,$pageNum,$showPage,$w)

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品列表页</title>
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
        <li><a href="#">商品管理</a></li>
        <li><a href="#">商品列表</a></li>
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
                        <input name="goodsname" type="text" value="<?php echo $goodsname? $goodsname :'' ?>" class="scinput" />
                    </li>
                    <li>
                        <label>状态</label>
                        <div class="vocation">
                            <select class="select3" name="active">
                                <option value="3" <?php echo $active==3?"selected" :''?>>全部</option>
                                <option value="1" <?php echo $active==1?"selected" :''?>>上架</option>
                                <option value="2" <?php echo $active==2?"selected" :''?>>下架</option>
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
                    <th></th>
                    <th>编号<i class="sort"><img src="<?php echo ADMIN_SKIN?>images/px.gif" /></i></th>
                    <th>商品名称</th>
                    <th>商品图片</th>
                    <th>商品分类</th>
                    <th>市场价格</th>
                    <th>销售价格</th>
                    <th>商品库存</th>
                    <th>商品销量</th>
                    <th>上架时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <form action="goodsAction.php?act=dels" method="post" id="form1">
                    <tbody>
                    <?php
                    if($goods){
                        foreach ($goods as $k=>$v){
                            ?>
                            <tr>
                                <td>
                                    <input name="chk[]" type="checkbox" onclick="chkon()" value="<?php echo $v['id']?>"/>
                                </td>
                                <td><?php echo ++$firstPage ?></td>
                                <td>
                                    <a href="/home/detail/php?id=<?php echo $v['id']?>" title="<?php echo $v['goodsname']?>">
                                        <?php echo mb_substr($v['goodsname'],0,40,'utf-8')?>
                                    </a>
                                </td>
                                <td>
<!--                                    <img src="--><?php //echo UPLOAD.'thumb_100_'.$v['image']?><!--" alt="商品图片">-->
                                    <img src="/upload/thumb_100_<?php echo $v['image']?>" alt="商品图片">
                                </td>
                                <td><?php echo $v['catename']?></td>
                                <td><?php echo $v['market_price']?></td>
                                <td><?php echo $v['price']?></td>
                                <td><?php echo $v['store_num']?></td>
                                <td><?php echo $v['saled_num']?></td>
                                <td><?php echo date('Y-m-d H:i:s',$v['add_time'])?></td>
                                <td>
                                    <a href="goodsAction.php?act=active&active=<?php echo $v['active']?>&id=<?php echo $v['id']?>">
                                        <?php echo $v['active']==1?'上架':'下架'?>
                                    </a>
                                </td>
                                <td>
                                    <a href="update.php?id=<?php echo $v['id']?>" class="tablelink">编辑</a>
                                    <a href="javascript:del(<?php echo $v['id']?>);" class="tablelink">删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="12"><h3>没有找到商品信息的信息</h3></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td>
                            <input name="chkall" type="checkbox" "/>
                        </td>
                        <td colspan="12">
                            <a href="javascript:dels();">批量删除</a>
                        </td>
                    </tr>
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
        if(confirm('确认删除该商品')){
            location = "goodsAction.php?act=del&id="+id
        }
    }
    //批量删除管理员
    function dels(){
        if(confirm('确认批量删除商品?')){
            document.getElementById('form1').submit();
        }
    }

</script>  
</html>
