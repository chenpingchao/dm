<?php
require_once "../conf.inc.php";

if(empty($_SESSION['mid'])){
    $login = 0;
}else{
    $login = 1;
}

//搜索功能
$msg = isset($_GET['message'])?$_GET['message']:'';
$username = isset($_GET['username'])? trim($_GET['username']):'';
// 判断用户名是否为空
if(empty($username)){
    $where = $msg?" where message like '%".$msg."%' and": 'where';
}else{
    $where = "where username like '%".$username."%' and";
    $where .= $msg?" message like '%".$msg."%' and" : '';
}

//查询信息
@$member = oneSelect("select * from zk_member where id={$_SESSION['mid']}");

//判断缓存中是否有信息
if(!$mem -> get($where)){
    //查询留言信息
    @$message = moreSelect("select s.*,username from zk_member m,zk_message s  $where s.mid=m.id  order by add_time limit 60");
    $mem -> set($where,$message,false,0);
}
$message = $mem -> get($where);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>留言板首页</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/list.css">
    <script src="../js/kindeditor/kindeditor-all-min.js"></script>
    <script src="../js/msg.js"></script>
    <script src="../js/jquery.js"></script>

</head>
<body>

<!--顶部开始-->
<div class="top">
    <div class="box">
        <img src="../images/logo.jpg" alt="logo" class="lf logo">
        <img src="../images/bg.png" alt="bg" class="lf bg">
        <?php
        if($login==1){
            ?>
            <div class="lf member">
                <span>亲爱的<b><?php echo $_SESSION['mname']?></b>，这是您第<b><?php echo $member['login_num']?></b>次登录</span>
            </div>
        <?php
        }else{
            ?>
            <div class="lf member">
                <span><a href="../index.php">您还没有账户,快去申请一个和小伙伴们一起留言吧</a></span>
            </div>  
            <?php
        }
        ?>

        <div class="rf login" >
            <a href="mine.php">我的留言</a>
            <a href="../login/update.php">更改信息</a>
            <a href="javascript:logout();">退出</a>
        </div>
    </div>
</div>
<!--顶部结束-->
<div class="search box">
    <form action="" id="from1">
        <label for="username">用户名：</label>
        <input type="text" name="username" value="<?php echo $username ?>" placeholder="请输入用户名关键字" style="margin-right: 60px">
        <label for="username">留言内容：</label>
        <input type="text" name="message" value="<?php echo $msg ?>" placeholder="请输入留言内容关键字" style="margin-right: 60px">
        <button onclick="document.getElementById('from1').submit()">搜索</button>
    </form>
</div>
<!--留言列表开始-->
<div class="main box ">
    <ul class="clearfix">
        <?php
        if($message){
            foreach ($message as $k=>$v){
                ?>
                <li onclick="location = 'detail.php?id=<?php echo $v['id']?>'">
                    <div class="front">
                        <b class="num"><?php echo $v['username']?></b>
                        <p class="time"><?php echo date("Y-m-d H:i:s",$v['add_time'])?></p>
                        <p><?php echo htmlentities(mb_substr($v['message'],0,20,'utf-8'))?></p>
                    </div>
                </li>
                <?php
            }
        }else{
            ?>
            <h3>暂时没有留言</h3>
            <?php
        }
        ?>
    </ul>
</div>
<!--留言列表结束-->

<!--留言表单开始-->

<div class="msg box">
    <form action="Action.php?act=message" method="post" id="send_msg">
        <label for="content">小主 , 请在下方留言</label>
        <textarea name="content" id="content" ></textarea>
        <button onclick="document.getElementById('send_msg').submit()">确认编辑</button>
    </form>
</div>
<!--留言表单结束-->

</body>

<script type="text/javascript">
    $(document).ready(function(e) {
        //加载富文本编辑器
        KindEditor.ready(function(K) {
            K.create('#content', {
                resizeType : 0,
                allowPreviewEmoticons : false,
                allowImageUpload : false,
                items : ['emoticons']
            });
        });
    });

    //退出
    function logout(){
        if(confirm("确认退出")){
            location = "Action.php?act=logout";
        }
    }
</script>

</html>