<?php
require_once "../../conf.inc.php";
//接受提交的处理函数
$act = $_GET['act'];
$act();

//添加商品到购物车中
function add(){
    //接收商品ID
    $gid = $_POST['gid'];
    //接收商品的数量
    $buynum = $_POST['buynum'];
//    print_r($_POST);
    //购物车添加或修改时间
    $add_time = time();
    //判断是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        //将该商品加入购物车表中   判断用户购物车中是否加入这个商品
        if(oneSelect("select id from cart where gid=$gid and mid=$mid limit 1")){
            //用户加入过这个商品
            $sql =update("update cart set buynum=buynum+$buynum where gid=$gid and mid=$mid limit 1");
            /*if(update("update cart set num=num+$buynum where gid=$gid and mid=$mid limit 1")){
                echo "<script>alert('1该商品已加入购物车');location = 'cartok.php?gid={$gid}&buynum={$buynum}'</script>";
            }else{
                echo "<script>alert('2该商品加入购物车失败');history.back()</script>";
            }*/
        }else{
            //用户没加入过这个商品
//            exit("insert into cart(mid,gid,num,add_time) value ($mid,$gid,$buynum,$add_time))");
            $sql =insert("insert into cart(mid,gid,buynum,add_time) value ($mid,$gid,$buynum,$add_time)");
        }
        if($sql){
            echo "<script>alert('该商品已加入购物车');location = 'cartok.php?gid={$gid}&buynum={$buynum}'</script>";
        }else{
            echo "<script>alert('该商品加入购物车失败');history.back()</script>";
        }
    }else{
        //用户没有登录 判断用户是否添加过这个商品
        if(isset($_SESSION['cart'][$gid])){
            //用户添加过这个商品
            $_SESSION['cart'][$gid]['buynum'] += $buynum;
            $_SESSION['cart'][$gid]['add_time'] = $add_time;
        }else{
            //用户没有添加这个商品
            $_SESSION['cart'][$gid] = ['gid'=>$gid ,'buynum'=>$buynum ,'active'=> 1 ,'add_time'=>$add_time];
        }
       echo "<script>alert('该商品已加入购物车');location = 'cartok.php?gid={$gid}&buynum={$buynum}'</script>";
    }
}


//删除单个商品
function del(){
    $gid = $_GET['gid'];
    //判断是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        if(delete("delete from cart where mid=$mid and gid=$gid")){
            echo "<script>alert('商品删除成功');location = 'mycart.php'</script>";
        }else{
            echo "<script>alert('商品删除失败');location = 'mycart.php'</script>";
        }
    }else{
        //用户未登录
        unset($_SESSION['cart'][$gid]);
        echo "<script>alert('商品删除成功');location = 'mycart.php'</script>";
    }
}
//删除单个商品
function dels(){
    $gid = $_GET['gid'];
    //判断是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        if(delete("delete from cart where mid=$mid")){
            echo "<script>alert('商品删除成功');location = 'mycart.php'</script>";
        }else{
            echo "<script>alert('商品删除失败');location = 'mycart.php'</script>";
        }
    }else{
        //用户未登录
        unset($_SESSION['cart']);
        echo "<script>alert('商品删除成功');location = 'mycart.php'</script>";
    }
}

//勾选单个商品
function active()
{
    $gid = $_GET['gid'];
    $active = $_GET['active'];
    //判断用户是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        update("update cart set active=$active where mid=$mid and gid=$gid");
    }else{
        //用户未登录
        $_SESSION['cart'][$gid]['active'] = $active;
    }
   header("location:mycart.php");
}

//勾选多个商品
function acts(){
    $active = $_GET['active'];
    //判断用户是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        update("update cart set active=$active where mid=$mid");
    }else{
        //用户未登录
       foreach($_SESSION['cart'] as $k=>$v){
           $_SESSION['cart'][$k]['active'] = $active;
       }
    }
    header("location:mycart.php");
}

//减少数量
function lose(){
    $gid = $_GET['gid'];
    //判断用户是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        update("update cart set buynum=buynum-1 where mid=$mid and gid=$gid");
    }else{
        //用户未登录
        $_SESSION['cart'][$gid]['buynum'] -= 1;
    }
    header("location:mycart.php");
}
//增加数量
function up(){
    $gid = $_GET['gid'];
    //判断用户是否登录
    if(isset($_SESSION['mid'])){
        //用户已登录
        $mid = $_SESSION['mid'];
        update("update cart set buynum=buynum+1 where mid=$mid and gid=$gid");
    }else{
        //用户未登录
        $_SESSION['cart'][$gid]['buynum'] += 1;
    }
    header("location:mycart.php");
}