<?php
require_once "../conf.inc.php";
require_once "public/header.php";


$id = $_GET['id'];

//$id = 1;
//查寻该商品的全部信息
$goods_all = oneSelect("select * from goods where id=$id limit 1");
//print_r($goods_all);
//exit;
//查询该商品的副图
$goods_image = moreSelect("select * from goods_image where gid=$id");
?>
<!DOCTYPE html>
<html lang="en" style="margin:-18px">
<head>
    <meta charset="UTF-8">
    <title>商品详情页</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="<?php echo HOME_SKIN ?>js/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/detail.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN ?>css/jquery.jqzoom.css">

    <link href="<?php echo HOME_SKIN ?>css/demo.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="<?php echo HOME_SKIN ?>css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo HOME_SKIN ?>js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo HOME_SKIN ?>js/jquery.jqzoom-core.js"></script>
    <script type="text/javascript" src="<?php echo HOME_SKIN ?>js/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.jqzoom').jqzoom({
                zoomType: 'standard',
                lens:true,
                preloadImages: true,
                alwaysOn:false,
                title:false,
                zoomWidth:430,
                zoomHeight:430,
                xOffset:20,
                yOffset:0
            });

        });
    </script>
</head>
<body>

<!-- 头部开始 -->
<div class="menuBar">
    <ul class="box">
        <li class="category" onmouseover="document.getElementById('nav').style.display='block';" onmouseout="document.getElementById('nav').style.display='none';">
            <a href="">全部商品分类</a>
            <div id="nav" style='display:none;z-index:9999'>
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

<div class="box goodsinfo">
    <div class="lf leftinfo">
        <!--jQzoom开始-->
        <!--显示上面大图和放大镜-->
        <div>
            <a href="/upload/thumb_800_<?php echo $goods_all['image']?>" class="jqzoom" rel='gal1'  title="triumph" >
                <img src="/upload/thumb_500_<?php echo $goods_all['image']?>"  title="triumph" width="350" />
            </a>
        </div>
        <!--显示下面三张小图-->
        <div >
            <ul id="thumblist" class="clear"  >
                <li>
                    <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '/upload/thumb_500_<?php echo $goods_all['image']?>',largeimage: '/upload/thumb_800_<?php echo $goods_all['image']?>'}">
                        <img src='/upload/thumb_100_<?php echo $goods_all['image']?>' width="50"/>
                    </a>
                </li>
                <?php
                if($goods_image){
                    foreach($goods_image as $v){
                ?>
                <li>
                    <a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '/upload/thumb_500_<?php echo $v['image']?>',largeimage: '/upload/thumb_800_<?php echo $v['image']?>'}">
                        <img src='/upload/thumb_100_<?php echo $v['image']?>' width="50"/>
                    </a>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <!--jQzoom结束-->
    </div>
    <div class="lf rightinfo">
        <form action="cart/cartAction.php?act=add" method="post" id="form1">
            <input type="hidden" name="gid" value="<?php echo $goods_all['id']?>">
        <div>
            <h2><?php echo mb_substr($goods_all['goodsname'],0,30)?></h2>
            <dl>
                <dd>市场价：<span class='marketprice'>¥ <?php echo $goods_all['market_price']?></span></dd>
                <dd>易购价：<span class='price'>¥<?php echo $goods_all['price']?></span></dd>
                <dd>总销量：<span><?php echo $goods_all['saled_num']?><span> &nbsp;&nbsp;现余库存：<span><?php echo $goods_all['store_num']?></span></dd>
                <dd>上架时间：<span><?php echo date("Y-m-d H:i:s",$goods_all['add_time'])?></span></dd>
                <dd></dd>
                <dd></dd>
                <dd >
                    <span>购买数量:</span>
                    <a href="javascript:decrement();" class="decrement">-</a>&nbsp;
                    <input type="text" value="1" name="buynum" id="buynum"/>&nbsp;
                    <a href="javascript:increment();" class="increment">+</a>
                </dd>
                <dd>
                    <div id="buy">
                        <a href="myorder.html" class="tobuy">立即购买</a>
                        <a onclick="document.getElementById('form1').submit();" class="tocart">加入购物车</a>
                    </div>
                </dd>
            </dl>
        </div>
        </form>
    </div>
</div>
<div class="clearfix"></div>
<div class="listMain"  id="pj">
    <div class="introduce">
        <div class="browse">
            <div class="mc">
                <ul>
                    <div class="mt">
                        <h2>看了又看</h2>
                    </div>
                    <li class="first">
                        <div class="p-img">
                            <a  href="#"> <img class="" src="<?php echo HOME_SKIN ?>images/browse1.jpg"> </a>
                        </div>
                        <div class="p-name"><a href="#">
                                【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                            </a>
                        </div>
                        <div class="p-price"><strong>￥35.90</strong></div>
                    </li>
                    <li>
                        <div class="p-img">
                            <a  href="#"> <img class="" src="<?php echo HOME_SKIN ?>images/browse1.jpg"> </a>
                        </div>
                        <div class="p-name"><a href="#">
                                【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                            </a>
                        </div>
                        <div class="p-price"><strong>￥35.90</strong></div>
                    </li>
                    <li>
                        <div class="p-img">
                            <a  href="#"> <img class="" src="<?php echo HOME_SKIN ?>images/browse1.jpg"> </a>
                        </div>
                        <div class="p-name"><a href="#">
                                【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                            </a>
                        </div>
                        <div class="p-price"><strong>￥35.90</strong></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="introduceMain">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">
                        <a href="#">
                            <span class="index-needs-dt-txt">宝贝详情</span></a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="index-needs-dt-txt">全部评价</span></a>
                    </li>
                </ul>
                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active">
                        <div class="J_Brand">
                            <div class="attr-list-hd tm-clear">
                                <h4>产品参数：</h4></div>
                            <div class="clear"></div>
                            <ul id="J_AttrUL">
                                <li title="">产品类型:&nbsp;烘炒类</li>
                                <li title="">原料产地:&nbsp;巴基斯坦</li>
                                <li title="">产地:&nbsp;湖北省武汉市</li>
                                <li title="">配料表:&nbsp;进口松子、食用盐</li>
                                <li title="">产品规格:&nbsp;210g</li>
                                <li title="">保质期:&nbsp;180天</li>
                                <li title="">产品标准号:&nbsp;GB/T 22165</li>
                                <li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
                                <li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
                                <li title="">食用方法：&nbsp;开袋去壳即食</li>
                            </ul>
                            <div class="clear"></div>
                        </div>

                        <div class="details">
                            <div class="attr-list-hd after-market-hd">
                                <h4>商品细节</h4>
                            </div>
                            <div class="twlistNews">
                                <img src="<?php echo HOME_SKIN ?>images/tw2.jpg" />
                                <img src="<?php echo HOME_SKIN ?>images/tw3.jpg" />
                                <img src="<?php echo HOME_SKIN ?>images/tw4.jpg" />
                                <img src="<?php echo HOME_SKIN ?>images/tw5.jpg" />
                            </div>
                        </div>
                        <div class="clear"></div>

                    </div>

                    <div class="am-tab-panel am-fade">

                        <div class="actor-new">
                            <div class="rate">
                                <strong>100<span>%</span></strong><br> <span>好评度</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="tb-r-filter-bar">
                            <ul class=" tb-taglist am-avg-sm-4">
                                <li class="tb-taglist-li tb-taglist-li-current">
                                    <div class="comment-info">
                                        <span>全部评价</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-1">
                                    <div class="comment-info">
                                        <span>好评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-0">
                                    <div class="comment-info">
                                        <span>中评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li--1">
                                    <div class="comment-info">
                                        <span>差评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <ul class="am-comments-list am-comments-list-flip">
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="">
                                    <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                                <div style="width:90%;margin-left:10%;">
                                    <ul class="am-comments-list am-comments-list-flip">
                                        <li class="am-comment">
                                            <!-- 回复容器 -->
                                            <a href="">
                                                <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                                <!-- 回复者头像 -->
                                            </a>

                                            <div class="am-comment-main">
                                                <!-- 回复内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 回复元数据 -->
                                                        <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                                        <!-- 回复者 -->
                                                        回复于
                                                        <time datetime="">2015年11月02日 17:46</time>
                                                    </div>
                                                </header>

                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255776406962">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                            摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                                        </div>
                                                        <div class="tb-r-act-bar">
                                                            颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- 回复内容 -->
                                            </div>
                                        </li>
                                        <li class="am-comment">
                                            <!-- 回复容器 -->
                                            <a href="">
                                                <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                                <!-- 回复者头像 -->
                                            </a>

                                            <div class="am-comment-main">
                                                <!-- 回复内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 回复元数据 -->
                                                        <a href="#link-to-user" class="am-comment-author">l***4 (匿名)</a>
                                                        <!-- 回复者 -->
                                                        回复于
                                                        <time datetime="">2015年10月28日 11:33</time>
                                                    </div>
                                                </header>

                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255095758792">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                            没有色差，很暖和……美美的
                                                        </div>
                                                        <div class="tb-r-act-bar">
                                                            颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- 评论内容 -->
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="">
                                    <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="#link-to-user" class="am-comment-author">l***4 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年10月28日 11:33</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255095758792">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                没有色差，很暖和……美美的
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="">
                                    <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="">
                                    <img class="am-comment-avatar" src="<?php echo HOME_SKIN ?>images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="#link-to-user" class="am-comment-author">h***n (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月25日 12:48</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="258040417670">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                式样不错，初冬穿
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：L
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>

                        </ul>

                        <div class="clear"></div>

                        <!--分页 -->
                        <ul class="am-pagination am-pagination-right">
                            <li class="am-disabled"><a href="#pj">&laquo;</a></li>
                            <li class="am-active"><a href="#pj">1</a></li>
                            <li><a href="#pj">2</a></li>
                            <li><a href="#pj">3</a></li>
                            <li><a href="#pj">4</a></li>
                            <li><a href="#pj">5</a></li>
                            <li><a href="#pj">&raquo;</a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="clearfix"></div>
<!-- 底部开始 -->
<div class="footer">
    <p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
    <p>版权所有：河南云和数据信息技术有限公司</p>
    <p>© CopyRight2017 All rights reserved.</p>
    <p>豫ICP备14003305号</p>
</div>
<!-- 底部结束 -->

</body>
<script type="text/javascript">
    function decrement(){
        var buynum=document.getElementById('buynum').value;
        if(buynum>1){
            document.getElementById('buynum').value=parseInt(buynum)-1;
        }
    }

    function increment(){
        var buynum=document.getElementById('buynum').value;
        if(buynum<199){
            document.getElementById('buynum').value=parseInt(buynum)+1;
        }
    }

    document.getElementById('buynum').onkeyup=function(){
        if(this.value<1){
            this.value=1;
        }
        if(this.value>199){
            this.value=199;
        }
        if(isNaN(this.value)){
            this.value=1;
        }
    }

</script>
</html>
