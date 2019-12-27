<?php
require_once "../../conf.inc.php";
//查询购物车里的商品
if(isset($_SESSION['mid'])){
    //用户已登录
    $cart = moreSelect("select mid,gid,buynum,active from cart where mid={$_SESSION['mid']}");
}else{
    //用户未登录
    $cart =isset($_SESSION['cart'])? $_SESSION['cart'] : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/public.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_SKIN?>css/index.css">
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="<?php echo HOME_SKIN?>css/membercenter.css" />
    <link rel="shortcut icon" href="/favicon.ico">
    <style type="text/css">
       #pageBody input{
          width:25px;
          height: 15px;
          text-align: center;
        }
    </style>
    <script type="text/javascript" src="<?php echo HOME_SKIN?>js/jQuery.1.8.2.min.js"></script>
</head>
<body>

	<!-- 头部开始 -->
    <a name="top"></a>
	<div class="header">
        <?php
        require_once "../public/header.php"   ?>
		<div class="menuBar">
			<ul class="box">
				
				<li>
					<a href="" >首页</a>
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
<div class="buyer_day box"> 
  <p class="select_title"><span>我的购物车</span></p>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
    <thead>
      <tr>
        <th class="xuhao"></th>
        <th width="15%">商品图片</th>
        <th width="30%">商品名称</th>
        <th width="10%">商品单价(元)</th>
        <th width="20%">商品数量</th>
        <th width="10%">小计(元)</th>
        <th width="5%">操作</th>
      </tr>
    </thead>
    <tbody id="pageBody">
        <?php
        if($cart){
            foreach($cart as $v){
                //查询对应gid的商品
                $goods = oneSelect("select id,goodsname,image,price from goods where id={$v['gid']}");
//                print_r($goods);
        ?>
          <tr>
                <td class="xuhao" style="color: #ff0000">
                    <input  onchange="gettotalprice();" onclick="active(this,<?php echo $v['gid']?>)" <?php echo $v['active']==1? 'checked': ''?> type="checkbox" name="chk[]" />
                </td>
                <td >
                    <a href="">
                        <img src="/upload/thumb_100_<?php echo $goods['image']?>" alt="商品无图片" style="width:80px;margin:10px;" />
                    </a>
                </td>
                <td ><a href="#"><?php echo mb_substr($goods['goodsname'],0,39)?></a></td>
                <td ><a href="#" class="price"><?php echo $goods['price']?></a></td>
                <td >                   
                        <a href="javascript:decrement(<?php echo $v['gid']?>);" class="decrement">-</a>&nbsp;
                        <input type="text" value="<?php echo $v['buynum']?>" class="num" id="buynum<?php echo $v['gid']?>" onkeyup="chgnum(this)" />&nbsp;
                        <a href="javascript:increment(<?php echo $v['gid']?>);" class="increment">+</a>
                <td class="prices">3088.00</td>
                <td ><a href="javascript:onclick=del(<?php echo $v['gid']?>);">删除</a></td>
          </tr>
        <?php
            }
        }else{
        ?>
            <tr>
                <td colspan="7" style="text-align:center;font-size:30px;">您的购物车里还没有商品，去添加一些吧</td>
            </tr>
        <?php
        }
        ?>
            <tr>
               <td  class="xuhao" style="color: #ff0000">
                <input type="checkbox" onchange="gettotalprice();" id="chkAll" name="chkAll" />
              </td>
              <td  class="xuhao" style="color: #ff0000">
                <a href="cartAction.php?act=dels">全部删除</a>
              </td>
              <td colspan="5" id="buy">
                  <span>总价:<b id="totalprice">￥888.88</b></span>
                  <a href="../order/myorder.php" class="tobuy">去结算</a>
              </td>
            </tr>
    </tbody>
  </table>

  <div style="clear:both;"></div>
 
</div>  
    <div style="clear:both;"></div>
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
      <li onclick="toLogin();"></li>
      <li onclick="location = 'mycart.php'"></li>
      <li></li>
      <li></li>
    </ul>
    <ul class="bottomBar">
      <li></li>
      <li  onclick="location = '#top'"></li>
    </ul>
  </div>
  <!-- 右侧菜单结束 -->
  <!-- 遮照层开始 -->
  <div id="shadow"></div>
  <!-- 遮照层结束 -->
  <!-- 登录层开始 -->
  <div id="login">
    <div id="close">&times;</div>
        <div id="loginTitle">用户登录</div>
        <div id="loginForm">
            <form action="../member/memberAction.php?act=login&url=mycart" method="post" id="form1" >
                <table border="0">
                    <tr>
                        <td><label>用户名：</label></td>
                        <td>
                            <input type="text" placeholder="请输入用户名" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td><label>密码：</label></td>
                        <td><input type="password" placeholder="请输入密码" name="password"></td>
                    </tr>

                    <tr>
                        <td><label>验证码：</label></td>
                        <td>
                            <input type="text" name="captcha" class="yzm">
                            <img src="/public/captcha.php" onclick="this.src='/public/captcha.php?num='+Math.random()" class="yzmImg" >
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="loginTd">
                            <a class="loginBtn" onclick="document.getElementById('form1').submit()">登录</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="toLogin">
                    <span>
                    您还没有账号？请 <a href="/home/member/add.php">免费注册</a>
                    </span>
                    <span>
                    忘记密码？<a href="#" class="">找回密码</a>
                    </span>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
  </div>
  <!-- 登录层结束 -->
</body>
<script type="text/javascript" src="<?php echo HOME_SKIN?>js/myfocus/myfocus-2.0.4.min.js"></script>
<script>
    //改变单个商品的勾选状态
    function active(me,gid){
        var active = (me.checked ? 1 : 2);
        location = "cartAction.php?act=active&gid="+gid+"&active="+active;
    }
    //全选全不选
    function chk(){
        var chkAll=document.getElementById('chkAll');
        var chks=document.getElementsByName('chk[]');
        for(var i=0;i<chks.length;i++){
            chks[i].checked=chkAll.checked;
        }
        //跳转到处理勾选
        var active = (chkAll.checked ? 1 : 2);
        location = "cartAction.php?act=acts&active="+active;
    }
    document.getElementById('chkAll').onclick=chk;
    //维持全选
    var chkAll=document.getElementById('chkAll');
    var chka=document.getElementsByName('chk[]');
    var num = 0;
    for(var i=0; i<chka.length ;i++){
        if(chka[i].checked){
            num++;
        }
    }
    if(num == chka.length){
        chkAll.checked = true;
    }else{
        chkAll.checked = false;
    }

    //商品数量的减
    function decrement(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
        document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
        //跳转 改变用户的购物车商品的数量  n 传的值为gid
        location = 'cartAction.php?act=lose&gid='+n
    }
    //商品数量的加
    function increment(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
        //跳转 改变用户的购物车商品的数量
        location = 'cartAction.php?act=up&gid='+n
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>199){
            v.value=199;
        }
        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }
    //计算 小计
    function getprices(){
       var nums=document.getElementsByClassName('num');
       var price=document.getElementsByClassName('price');
       var prices=document.getElementsByClassName('prices'); 
       for(var i=0;i<price.length;i++){
       
           prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(nums[i].value);
  
      };
    }
    //计算总价
   function gettotalprice(){
		getprices();
      var inputs=document.getElementsByName('chk[]');
      var prices=document.getElementsByClassName('prices'); 
      var totalprice=0;
      for(var i=0;i<inputs.length;i++){
        if(inputs[i].checked){
           totalprice+=parseInt(prices[i].innerHTML);
        };
      };
     document.getElementById('totalprice').innerHTML='￥'+totalprice;
   }

   gettotalprice(); 
    //遮罩层
   var shadow=document.getElementById('shadow');
   var login=document.getElementById('login'); 
    function toLogin(){ 
    //弹出遮照层
    shadow.style.display="block";
    //shadow.style.height=document.documentElement.scrollHeight+'px';
    //登录层   
    login.style.display="block"
    login.style.left=(document.documentElement.clientWidth-login.offsetWidth)/2+'px';
    login.style.top=(document.documentElement.clientHeight-login.offsetHeight)/2+'px';
  }

  shadow.onclick=document.getElementById('close').onclick=function(){
    shadow.style.display="none";
    login.style.display="none";
  }

  //删除单个类型的商品
    function del(gid){
        if(confirm('确认删除该商品')){
            location = "cartAction.php?act=del&gid="+gid;
        }
    }


    </script>
</html>