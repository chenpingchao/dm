<?php
    require_once "../../conf.inc.php";
    //判断用户是否登录
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php ");
    $_SESSION['url'] = "myorder";
}
//查询商品的信息
$goods = moreSelect("select image,goodsname,price,buynum from goods g,cart c where c.gid=g.id and c.active=1 and mid={$_SESSION['mid']}");
//dd($goods);
//判断购物车里是否有商品
if(empty($goods)){
    echo "<script>alert('购物车没有选中的商品')</script>";
    header("location:../cart/mycart.php");
}
//查询商品的总价
$total = oneSelect("select sum(price*buynum) as total from goods g,cart c where c.gid=g.id and c.active=1 and mid={$_SESSION['mid']} ");
//生成订单编号
$order_number = date('YmdHis').md5(uniqid());
//dd($order_number);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单详情</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/order.css">
</head>

<body>
  <!-- 头部开始 -->
  <div class="header">
    <?
    include_once "../public/header.php"
    ?>
    <div class="menuBar">
      <ul class="box">
        <li class="category" onmouseover="document.getElementById('nav').style.display='block';" onmouseout="document.getElementById('nav').style.display='none';">
          <a href="">全部商品分类</a>
          <div id="nav" style='display:none;z-index:9999'>
            <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品1 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品1 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品1 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品1 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品1 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>
            
            <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品2 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品2 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品2 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品2 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品2 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>

                        <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品3 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品3 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品3 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品3 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品3 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>

                        <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品4 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品4 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品4 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品4 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品4 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>        

                        <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品5 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品5 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品5 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品5 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品5 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>

                        <dl onmouseover="this.lastChild.style.display='block';" onmouseout="this.lastChild.style.display='none';">
              <dt>
                <a href="">手机</a>
              </dt>
              <dd>
                <a href="">华为mate9</a>
              </dd>
              <dd>
                <a href="">iphone7s</a>
              </dd>
              <dd>
                <a href="">note5</a>
              </dd>
              <div class="nextList">
                                  <div class="cateLeft">                                
                                    <div class="clist">  
                      <div class="listTitle">
                      手机精品6 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品6 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品6 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品6 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                      <div class="clist">  
                      <div class="listTitle">
                      手机精品6 &gt;
                      </div>  
                      <div class="listContent">
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                        <a href="#">绝对精品</a>
                      </div>
                      </div>

                                  </div>
                  <div class="cateRight">
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images/cateAd1.jpg" />
                  </div>
                                </div></dl>
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
  </div>
  <!-- 头部结束 -->
<div class="box">
		<p class="orderpro01">
            <span>订单详情</span>
        </p>
		<div class="orderprocon">
		  <div class="clearfix" style="width:100%;">
			<div class="orderprodiv clearfix">
                <p class="orderproinfo"><span>订单信息</span></p>
				<p><span>订单状态：</span>待付款</p>
				<p><span>订单号：</span><?php echo $order_number?></p>
				<p><span>下单时间：</span><?php echo date('Y-m-d H:i:s',time())?></p>
			</div>
            
			<div class="orderprodiv clearfix" style="position:relative">
                <p class="orderproinfo orderproinfo001"><span>收货信息</span></p>
				<p><span>收货地址：</span>河南省郑州市高新区电子商务中心</p>
				<p><span>收货人：</span>张三</p>
				<p><span>联系方式：</span>15237150303</p>
			</div>
           </div>
           	<p class="orderproinfo"><span>支付方式</span></p>
           	<div style="padding:30px 0;">
           	<form action="orderAction.php?act=add_order" method="post" id="form1">
                <input type="hidden" name="order_nmber" value="<?php echo $order_number?>">
           		<input type="radio" checked name="paytype" value="money" style="width:18px;vertical-align:middle"/>余额支付
           		<input type="radio"  name="paytype" value="alipay" style="width:18px;vertical-align:middle"/>支付宝支付
           		<input type="radio"  name="paytype" value="wxpay" style="width:18px;vertical-align:middle"/>微信支付
           	</form>
           	</div>
			<p class="orderproinfo"><span>商品信息</span></p>
			<table class="orderinfomation" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th class="orderdetitle">商品名称</th>						
						<th class="orderdejiage">单价（元）</th>
						<th class="orderdesum">总量（件）</th>
						<th class="orderdezjia">商品总价</th>
					</tr>
				</thead>
				<tbody>
                <?php
                foreach ($goods as $v){
                ?>
					<tr>
						<td class="orderdetitle" style="text-align:left;">
							<img style="width:60px;vertical-align:middle" src="/upload/thumb_100_<?php echo $v['image']?>" />
							<p><a href="#"><?php echo mb_substr($v['goodsname'],0,39)?></a></p>
						</td>					
						<td class="orderdejiage"><?php echo $v['price']?>元</td>
						<td class="orderdesum"><?php echo $v['buynum']?>件</td>
						<td class="orderdezjia">￥<?php echo $v['buynum']*$v['price']?></td>
					</tr>
                <?php
                }
                ?>
				</tbody>
			</table>
			<div class="ordersumer" id="buy">
				商品总价:￥<?php echo $total['total']?> + 运费:￥10 = 实付款<span style="color:red;font-size:20px;">￥<?php echo $total['total']+10?></span>
                <a href="javascript:document.getElementById('form1').submit();" class="tobuy">提交定单</a>
			</div>
		
	</div>
</div>
    <div style="clear:both;"></div>
<!-- 尾部开始 -->
    <div class="footer">

            <p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
            <p>版权所有：河南云和数据信息技术有限公司</p>
            <p>© CopyRight2016 All rights reserved.</p>
            <p>豫ICP备14003305号</p>
    </div>
<!-- 尾部结束 -->

</body>

</html>
