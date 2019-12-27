<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['mid'])){
    header("location:/home/member/login.php");
}
$act = $_GET['act'];
$act();
//查询商品的总价
$total = oneSelect("select sum(price*buynum) as total from goods g,cart c where c.gid=g.id and c.active=1 and mid={$_SESSION['mid']} ");

//生成订单
function add_order(){
//    dd($_POST);
    $order_syn = $_POST['order_nmber'];
    $paytype = $_POST['paytype'];
    $time = time();
    $mid = $_SESSION['mid'];
    //查询商品的总价
    $total = oneSelect("select sum(price*buynum) as total from goods g,cart c where c.gid=g.id and c.active=1 and mid={$_SESSION['mid']} ")['total'];

    //将订单写入订单表
    $sql = "insert into orders(mid,order_syn,order_price,add_time) value('$mid','$order_syn',$total,$time)";
    if($oid = insert($sql)){
        //从购物车中查询该订单的商品有哪些
        $goods = moreSelect("select id,buynum,gid from cart where active=1 and mid=$mid");
        foreach($goods as $v){
            //写入订单商品表
            insert("insert into order_goods(oid,gid,num) value ($oid,{$v['gid']},{$v['buynum']})");
            //删除购物车中的商品
            delete("delete from cart where id={$v['id']}");
        }
        //选择支付方式
        switch($paytype){
            case 'money':
                header("location:moneypay.php?id=$oid");
                break;
            case 'alipay':
//                支付宝支付接口
                ;
                break;
            case 'wxpay':
//                微信支付接口
                ;
                break;
        }

    }else{
        echo "<script>alert('订单生成失败');history.back()</script>";
    }

}

//订单支付
function pay(){
    $oid = $_POST['oid'];
    $mid = $_SESSION['mid'];
    $pay = implode('',$_POST['pwd']);
//    dd($pay);
//    exit;
    //查询用户的余额
    $money = oneSelect("select money from member where id=$mid");
    //查询需要支付的金额
    $order_price = oneSelect("select order_syn,order_price from orders where id=$oid");
    //判断余额是否足够支付
    if($money['money'] >= $order_price['order_price']){
        //判断支付密码是否正确
        $pay = md5($pay);
        $paypwd = oneSelect("select paypwd from member where id=$mid");
        if($pay == $paypwd['paypwd']){
            //更改订单状态
            update("update orders set status=2 where id=$oid ");
            //扣除金额
//            var_dump("update membre set money=money-{$order_price['order_price']} where id=$mid");
//            exit;
            if(update("update member set money=money-{$order_price['order_price']} where id=$mid")){
                echo "<script>alert('订单支付成功');location = 'orderok.php?order_syn={$order_price['order_syn']}'</script>";
            }else{
                echo "<script>alert('订单支付失败');history.back()</script>";
            }
        }else{
            echo "<script>alert('支付密码不正确');history.back()</script>";
        }
    }else{
        echo "<script>alert('余额不足，请及时充值');history.back()</script>";
    }
}

//订单确认收货
function over(){
    $oid = $_GET['oid'];
    if(update("update orders set status=4 where id=$oid")){
        echo "<script>alert('订单收货成功');location = 'orderlist.php'</script>";
    }else{
        echo "<script>alert('订单收货失败');location = 'orderlist.php'</script>";
    }
}