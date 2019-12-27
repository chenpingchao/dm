<?php
//分类树的实现
function cateTree($cate,$pid){
    $Tree= [] ;
    //对$cate 进行遍历
    foreach( $cate as $v){
        //子分类是否存在
        if($v['pid']==$pid){
            //在此递归查询子分类
            $v['child'] = cateTree($cate,$v['id']);
            $Tree[]= $v;
        }
    }
    return $Tree;
}

//查询所有的分类
$cate = moreSelect("select  * from category where active=1 order by path ");
$cate_tree = cateTree($cate,0);

//购物车商品数量
if(isset($_SESSION['mid'])){
    //用户已登录
    $mid = $_SESSION['mid'];
    $num = oneselect("select sum(buynum) from cart where mid=$mid")['sum(buynum)'];
}else{
    //用户未登录
    if(isset($_SESSION['cart'])){
        $num = 0;
        foreach($_SESSION['cart'] as $k=>$v){
            $num += $_SESSION['cart'][$k]['buynum'];
        }
    }else{
        $num = 0;
    }

}
?>
<div class="header">
<div class="topBar">
    <div class="box">
        <ul class="topLeft">
            <?php
            if(isset($_SESSION['mid'])){
            ?>
                <li>
                    <span>欢迎<?php echo $_SESSION['mname']?>，来到易购网</span>
                </li>
                <li>
                    <a href="/home/member/memberAction.php?act=logout">退出</a>
                </li>
            <?php
            }else{
            ?>
                <li>
                    <span>欢迎您，来到易购网</span>
                </li>
                <li>
                    <a href="/home/member/login.php">请登录</a>
                </li>
                <li>
                    <a href="/home/member/add.php">免费注册</a>
                </li>
            <?php
            }
            ?>
        </ul>
        <ul class="topRight">
            <li>
                <a href="#">关注易购网</a>
                <div class="qrcode">
                    <div class="arrow"></div>
                    <img src="<?php echo HOME_SKIN ?>images/qrcode.jpg" alt="">
                </div>
            </li>
            <li>
                <a href="#">帮助中心</a>
            </li>
            <li>
                <a href="#">我的收藏</a>
            </li>
            <li>
                <a href="">我的订单</a>
            </li>
            <li>
                <a href="/home/usercetent/index.php">用户中心</a>
            </li>
        </ul>
    </div>
</div>
<div class="logoBar box">
    <div class="logo lf">
        <a href="/"><img src="<?php echo HOME_SKIN ?>images/logo.png" alt="logo" /></a>
    </div>
    <div class="search lf">
        <input type="text" name="keywords" placeholder="请输入商品关键字" class="lf">
        <button class="lf">搜索</button>
        <div class="clearfix"></div>
        <div class="hotSearch">
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
            <a href="">平板电脑</a>
        </div>

    </div>
    <div class="cart lf" onclick="location = '/home/cart/mycart.php'">
        <i></i>
        我的购物车
        <span><?php echo $num ?></span>
    </div>
</div>

</div>