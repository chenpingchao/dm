<?php
require_once "../../conf.inc.php";
//接收商品ID和数量
$gid = $_GET['gid'];
$buynum = $_GET['buynum'];
//查询商品表中的商品
//var_dump("select goodsname,price from goods where id=$gid limit 1");
$goods = oneSelect("select goodsname,price,image from goods where id=$gid limit 1");
//var_dump($goods);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品成功加入购物车</title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/index.css">
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
    <?php require_once "../public/header.php"?>
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
                    <img src="<?php echo HOME_SKIN?>js/cateAd1.jpg" />
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

   <div style="margin:20px auto;padding:45px;background:#F5F5F5;">
     <div class="box">
        <h1 style="color:#71B247;margin:30px 70px">恭喜，商品已成功加入购物车</h1>
        <table width="100%" border="0" style="border:0" id="cart">
              <tr>
                <td>
                    <a href="" style="font-size:16px;">
                        <img src="/upload/thumb_100_<?php echo $goods['image']?>" alt="该商品暂时无图片" style="width:80px;margin:10px;vertical-align:middle" />
                        <?php echo mb_substr($goods['goodsname'],0,40)?> &nbsp;&nbsp;购买数量：<?php echo $buynum?> &nbsp;&nbsp;单价：<?php echo $goods['price']?>
                    </a>
                </td>
                <td class="pxtitle">
                    <a href="/" style="padding:10px 20px;font-size:14px;">继续购物</a>
                    <a href="mycart.php" style="padding:10px 20px;font-size:14px;background:#B1191A">去购物车结算</a>
                </td>
            </tr>
            </table>
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
<script type="text/javascript">
    $(function() {
      $('.cateList').hide();
    });
    
    function sort(v) {
        $(v).addClass('active').siblings().removeClass('active');               
    }
</script>
</html>