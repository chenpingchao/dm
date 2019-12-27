<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}
$order_syn = $_GET['order_syn'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单支付成功</title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/order.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/search.css">
    <style type="text/css">
        #cart td{
            border: 0;
            text-align: left;
            color: #666;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript" src="<?php echo HOME_SKIN?>js/jQuery.1.8.2.min.js"></script>
</head>
<body>
  <!-- 头部开始 -->
  <div class="header">
  <?php
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

<div style="margin-bottom:20px;padding:45px;height: 300px">
    <div class="box">
        <h1 style="color:#71B247;height:150px;line-height:150px;padding-left:100px;margin:10px 0;background:url('<?php echo HOME_SKIN?>images/ok.jpg') no-repeat left 30px;">
            订单<?php echo $order_syn?>支付成功！
            <a href="/" style="margin:0px 10px;font-size:16px;" target="_self">返回首页继续购物</a>
            <a href="../usercetent/index.php" style="margin:0px 10px;font-size:16px;" target="_self">去用户中心查看订单</a> 
        </h1>
        <dl style="margin-left: 50px;font-size:16px;">
            <dt>温馨提示：</dt>
            <dd> &nbsp;</dd>
            <dd>1. 请保持手机畅通，以便快递公司和您联系，确保收件顺利</dd>
            <dd> &nbsp;</dd>
            <dd>2. 如有疑问，请拨打客服电话：400-6666-8888</dd>
        </dl>

    </div>
</div>

    <div class="pxlistcon box">
         <div class="pxlist" >
            <h3>购买该商品的用户还购买了</h3>
            <ul>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
                <li>
                   <a href="#" title="">
                        <img src="<?php echo HOME_SKIN?>images/iphone.jpg" alt="" />
                        <span>iPhone 6s 16 GB</span>
                   </a>
                   <p>￥4666</p>
                </li>
            </ul>
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