<?php
require_once "../conf.inc.php";

//接受留言的ID
$sid = $_GET['id'];
//查询留言
$message = oneSelect("select message from zk_message where id=$sid limit 1");

//查询用户信息
$member = oneSelect("select * from zk_member where id={$_SESSION['mid']}");

//查询评论
$detail = moreSelect("select *,username from detail d,zk_member m where d.mid=m.id and sid=$sid order by add_time desc limit 0,60");
//var_dump("select * from detail where sid=$sid order by add_time desc limt 0,60");
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>留言板详情页</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/list.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/kindeditor/kindeditor-all-min.js"></script>
    <style>
        #message{
            font-size: 20px;
            height:auto;
        }
        #message label{
            font-size: 10px;
        }
    </style>
</head>
<body>

<!--顶部开始-->
<div class="top">
    <div class="box">
        <img src="../images/logo.jpg" alt="logo" class="lf logo">
        <img src="../images/bg.png" alt="bg" class="lf bg">
            <div class="lf member">
                <span>亲爱的<b><?php echo $_SESSION['mname']?></b>，您共发表了<b><?php echo $member['say_num']?></b>条留言</span>
            </div>
        <div class="rf login">
            <a href="list.php">留言列表</a>
            <a href="mine.php">我的留言</a>
        </div>
    </div>
</div>
<!--顶部结束-->
<!--内容开始-->
<div class="msg box" id="message">
    <label for="content1">留言内容</label>
    <p><?php echo $message['message']?></p>
</div>
<!--内容结束-->
<!--评论内容-->
<div class="msg box" id="message">
    <label for="content">评论</label>
    <div class="main box ">
        <ul class="clearfix">
            <?php
            if($detail){
                foreach ($detail as $k=>$v){
                    ?>
                    <li>
                        <div class="front">
                            <b class="num"><?php echo $v['username']?></b>
                            <p class="time"><?php echo date("Y-m-d H:i:s",$v['add_time'])?></p>
                            <p><?php echo htmlentities(mb_substr($v['detail'],0,60,'utf-8'))?></p>
                        </div>
                    </li>
                    <?php
                }
            }else{
                ?>
                <h3>暂时没有评论</h3>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!--评论内容-->
<!--评论表单开始-->
<div class="msg box">
    <form action="Action.php?act=comment&sid=<?php echo $sid?>" method="post" id="send_msg">
        <label for="content">小主 , 请在下方发表你的评论</label>
        <textarea name="content" id="content" ></textarea>
        <button>发表评论</button>
    </form>
</div>
<!--评论表单结束-->

</body>
<script type="text/javascript">
    $(document).ready(function(e) {
        //加载富文本编辑器
        KindEditor.ready(function(K) {
            K.create('#content', {
                resizeType : 0,
                allowPreviewEmoticons : false,
                allowImageUpload : false,
                items : [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', '|', 'emoticons']
            });
        });
    });
</script>
</html>