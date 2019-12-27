<?php
//header("Content-Type:text/html;Charset=utf-8");
require_once('conf.inc.php');
/*if('123.' == '123'){
    echo 111;
}else{
    echo 222;
}
exit;*/

//查寻销量较高的产品
$saled = moreSelect("select id,goodsname,price,image from goods order by saled_num desc limit 10");

//查询某一分类下的所有产品
function sel($cid){
    $cate = oneSelect("select path from category where id=$cid and active=1");
    $path = $cate['path'];
    //判断分类下是否还有分类
    $arr = moreSelect("select id,catename from category where path like '$path,%'");
//    echo "<pre>";
    /*var_dump($arr);*/
    if($arr){
        //遍历该分类
        $ids ='';
        foreach($arr as $v ){
            $ids .= $v['id'].',';
        }
        $ids  = $ids.$cid;
        $goods = moreSelect("select id,goodsname,price,image from goods where cid in ($ids) and active =1");
//        var_dump("select id,goodsname,price,image from goods where active =1 and cid in ($ids) ");
    }else{
        //查找该分类下的所有商品
        $goods = moreselect("select id,goodsname,price,image from goodsname where cid=$cid and active =1 ");
    }
    return $goods;
}
$goodest = sel(1);
$days = sel(19);


/*echo"<pre>";
print_r(cateTree($cate,0));
echo"</pre>";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-首页,轻松购物</title>
	<base target="_blank" >
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/index.css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
    <a name="top"></a>
	<!-- 顶部广告开始 -->
	<div class="topAd">
		<img src="<?php echo HOME_SKIN ?>images/ad.jpg" alt="广告">
	</div>
	<!-- 顶部广告结束 -->
	<!-- 头部开始 -->
    <?php require_once('home/public/header.php');?>
    <div class="menuBar">
        <ul class="box">
            <li class="category">
                <a href="">全部商品分类</a>
                <div id="nav">
                    <?php
                    if($cate_tree){
                        foreach($cate_tree as $k=>$v){
                            if($k<6){
                                ?>
                                <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
                                    <dt>
                                        <a href="search.html"><?php echo $v['catename']?></a>
                                    </dt>
                                    <?php
                                    if($v['child']){
                                        foreach($v['child'] as $k2=>$v2){
                                            if($k2<4){
                                                ?>
                                                <dd>
                                                    <a href="search.html"><?php echo $v2['catename']?></a>
                                                </dd>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <!-- 隐藏区域-->
                                    <div class="nextList">
                                        <div class="cateLeft">
                                            <div class="clist">
                                                <?php
                                                if($v['child']){
                                                    foreach($v['child'] as $k2=>$v2){
                                                        if($k2<5){
                                                            ?>
                                                            <div class="listTitle"><?php echo $v2['catename']?></div>

                                                            <div class="listContent">
                                                                <?php
                                                                if($v2['child']){
                                                                    foreach($v2['child'] as $k3=>$v3){
                                                                        if($k3<10){
                                                                            ?>
                                                                            <a href="search.html"><?php echo $v3['catename']?></a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="cateRight">
                                            <img src="<?php echo HOME_SKIN ?>images/cateAd1.jpg" />
                                            <img src="<?php echo HOME_SKIN ?>images/cateAd1.jpg" />
                                            <img src="<?php echo HOME_SKIN ?>images/cateAd1.jpg" />
                                        </div>
                                    </div></dl>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </li>
            <li>
                <a href="" class="current">首页</a>
            </li>
            <li>
                <a href="">热卖专区</a>
            </li>
            <li>
                <a href="">积分商城</a>
            </li>
            <li>
                <a href="">品牌专卖</a>
            </li>
            <li>
                <a href="">限时秒杀</a>
            </li>
        </ul>
    </div>
	<!-- 头部结束 -->
	<!-- 轮播广告开始 -->
	<div class="ad box">
		<div id="myfocus">
			<div class="pic">
				<ul>
					<li><a href=""><img src="<?php echo HOME_SKIN ?>images/banner1.jpg" alt=""></a></li>
					<li><a href=""><img src="<?php echo HOME_SKIN ?>images/banner2.jpg" alt=""></a></li>
					<li><a href=""><img src="<?php echo HOME_SKIN ?>images/banner3.jpg" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 轮播广告结束 -->
	<!-- 商品展示开始 -->
	<div class="main box">
		<!-- 一楼开始 -->
		<div class="floor">
			<div class="floorTitle floorOne">
				1F 热卖专区
			</div>
			<div class="floorContent">
				<div class="goodsAd lf">
					<a href="">
						<img src="<?php echo HOME_SKIN ?>images/girl.jpg" alt="girl">
						<div>
							<b>4月流行趋势</b>
							<span>女装甜蜜复古</span>
						</div>
					</a>
				</div>
				<div class="goodsList rf">
					<ul>
                        <?php
                        if($saled){
                            foreach($saled as $v){
                        ?>
						<li>
							<a href="home/detail.php?id=<?php echo $v['id']?>" title="<?php echo $v['goodsname']?>">
								<img src="/upload/thumb_500_<?php echo $v['image']?>" alt="无图片">
								<span><?php echo mb_substr($v['goodsname'],0,12)?></span>
							</a>
							<p>￥<span><?php echo $v['price']?></span></p>
						</li>
                        <?php
                            }
                        }
                        ?>

					</ul>
				</div>
			</div>
		</div>
		<!-- 一楼结束 -->
		<!-- 二楼开始 -->
		<div class="floor">
			<div class="floorTitle floorTwo">
				2F 五金专区
			</div>
			<div class="floorContent">
				<div class="goodsAd lf">
					<a href="">
						<img src="<?php echo HOME_SKIN ?>images/girl.jpg" alt="girl">
						<div>
							<b>4月流行趋势</b>
							<span>女装甜蜜复古</span>
						</div>
					</a>
				</div>
				<div class="goodsList rf">
					<ul>
                        <?php
                        if($goodest){
                            foreach($goodest as $k=>$v){
                                if($k<10){
                        ?>
						<li>
							<a href="home/detail.php?id=<?php echo $v['id']?>" title="<?php echo $v['goodsname']?>">
								<img src="/upload/thumb_500_<?php echo $v['image']?>" alt="">
								<span><?php echo mb_substr($v['goodsname'],0,12)?></span>
							</a>
							<p>￥<span><?php echo $v['price']?></span></p>
						</li>
                        <?php
                                }
                            }
                        }
                        ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- 二楼结束 -->
		<!-- 三楼开始 -->
		<div class="floor">
			<div class="floorTitle floorThree">
				3F 日用化工
			</div>
			<div class="floorContent">
				<div class="goodsAd lf">
					<a href="">
						<img src="<?php echo HOME_SKIN ?>images/girl.jpg" alt="girl">
						<div>
							<b>4月流行趋势</b>
							<span>女装甜蜜复古</span>
						</div>
					</a>
				</div>
                <div class="goodsList rf">
                    <ul>
                        <?php
                        if($days){
                            foreach($days as $k=>$v){
                                if($k<10){
                                    ?>
                                    <li>
                                        <a href="home/detail.php?id=<?php echo $v['id']?>" title="<?php echo $v['goodsname']?>">
                                            <img src="/upload/thumb_500_<?php echo $v['image']?>" alt="">
                                            <span><?php echo mb_substr($v['goodsname'],0,21)?></span>
                                        </a>
                                        <p>￥<span><?php echo $v['price']?></span></p>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
			</div>
		</div>
		<!-- 三楼结束 -->
	</div>
	<!-- 商品展示结束 -->
	<!-- 底部开始 -->
	<div class="footer">
		<p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
		<p>版权所有：河南云和数据信息技术有限公司</p>
		<p>© CopyRight2017 All rights reserved.</p>
		<p>豫ICP备14003305号</p>
	</div>
	<!-- 底部结束 -->
	<!-- 右侧菜单开始 -->
	<div class="rightMenu">
		<ul class="midBar">
            <li onclick="location = '/home/usercetent/index.php'"></li>
			<li onclick="location = '/home/cart/mycart.php'"></li>
			<li></li>
			<li></li>
		</ul>
		<ul class="bottomBar">
			<li></li>
			<li onclick="location = '#top'"></li>
        </ul>
	</div>
	<!-- 右侧菜单结束 -->
</body>
<script type="text/javascript" src="<?php echo HOME_SKIN ?>js/myfocus/myfocus-2.0.4.min.js"></script>
<script>
	myFocus.set({
		id:'myfocus', //轮播盒子ID
		pattern:"mF_classicHC", //风格名称
		time:3, //切换图片的间隔(秒)
		width:1200,
		height:390,
		txtHeight:0
	})
</script>
</html>