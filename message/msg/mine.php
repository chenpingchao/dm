<?php
require_once "../conf.inc.php";
if(empty($_SESSION['mid'])){
header("location:../index.php");
}
//查询用户信息
$member = oneSelect("select * from zk_member where id={$_SESSION['mid']}");
//查询留言信息一个月
$old_time = strtotime("-1month");
$now = time();
$message = moreSelect("select s.* from zk_member m,zk_message s where s.mid=m.id and m.id={$_SESSION['mid']} and (add_time between $old_time and $now) order by add_time ")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的留言</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/mine.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/msg.js"></script>
</head>
<body>
<div>
    <div class="top">
        <div class="box">
            <div class="lf title">我的留言</div>
            <div class="lf member">
                <span>亲爱的<b><?php echo $_SESSION['mname']?></b>，您共发表了<b><?php echo $member['say_num']?></b>条留言</span>
            </div>
            <div class="rf msg" >
                <a href="list.php">留言列表</a>
            </div>
        </div>
    </div>
    <div class="box main clearfix">
        <ul>
            <?php
            if($message){
                foreach ($message as $k=>$v){
            ?>
            <li>
                <div class="front">
                    <b class="num"><?php echo ++$k?></b>
                    <p class="time"><?php echo date("Y-m-d H:i:s",$v['add_time'])?></p>
                    <p> <?php echo htmlentities(mb_substr($v['message'],0,20,'utf-8'))?></p>
                </div>
                <div class="back">
                    <a href="javascript:del(<?php echo $v['id']?>);">删除</a>
                    <a href="edit.php?id=<?php echo $v['id']?>">编辑</a>
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
</div>
</body>
<script>
//退出
function del(id){
    if(confirm("确认删除")){
        location = "Action.php?act=del&id="+id;
    }
}
</script>
</html>