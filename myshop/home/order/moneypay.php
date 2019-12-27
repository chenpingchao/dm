<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}
$mid = $_SESSION['mid'];
//查询用户的余额
$money = oneSelect("select money from member where id=$mid");
//查询需要支付的金额
$order_price = oneSelect("select id,order_price from orders where mid=$mid and id={$_GET['id']}")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>余额支付</title>
    <meta name="keywords" content="标题">
    <meta name="description" content="内容">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css//public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css//order.css">
</head>

<body>
  <!-- 头部开始 -->
  <div class="header">
 <?php
 include_once "../public/header.php";
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>images//cateAd1.jpg" />
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
		<div  id="buy">
        <h3 >
             账户余额:￥<span style="color:blue"><?php echo $money['money']?></span> &nbsp;&nbsp;&nbsp;
             应付金额:￥<span style="color:red"><?php echo $order_price['order_price']?> </span>
        </h3>
        <h1> &nbsp;</h1>
        <hr />
		<h2 >请输入支付密码:</h2>
            <form action="orderAction.php?act=pay" method="post" id="form1">
                <input type="hidden" name="oid" value="<?php echo $order_price['id']?>">
             <p style="margin:50px;text-align:center;">
                  <input type="password" maxlength="1" name="pwd[]"  onkeyup ="this.nextSibling.focus();" /><input type="password" maxlength="1" name="pwd[]" onkeyup ="this.nextSibling.focus();"/><input type="password" maxlength="1" name="pwd[]" onkeyup ="this.nextSibling.focus();"/><input type="password" maxlength="1" name="pwd[]" onkeyup ="this.nextSibling.focus();"/><input type="password" maxlength="1" name="pwd[]" onkeyup ="this.nextSibling.focus();"/><input type="password" maxlength="1" name="pwd[]" />
             </p>
            </form>
        <a href="javascript:document.getElementById('form1').submit();" class="tobuy" >确认支付</a>
		</div>
		

</div>
  
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
