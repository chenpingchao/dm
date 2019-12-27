<?php
require_once "../conf.inc.php";
if(empty($_SESSION['mid'])){
header("location:../index.php");
}
//接受留言ID
$sid = $_GET['id'];
//查询留言信息
$message =oneSelect("select message from zk_message  where id=$sid")

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>留言板首页</title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/list.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/kindeditor/kindeditor-all-min.js"></script>
</head>
<body>

<!--顶部开始-->
<div class="top">
    <div class="box">
        <img src="../images/logo.jpg" alt="logo" class="lf logo">
        <img src="../images/bg.png" alt="bg" class="lf bg">
        <div class="rf login" >
            <a href="../msg/mine.php">我的留言</a>
        </div>
    </div>
</div>
<!--顶部结束-->

<!--留言表单开始-->
<div class="msg box">
    <form action="Action.php?act=updated&sid=<?php echo $sid?>" method="post" id="send_msg">
        <label for="content">小主 , 请在下方编辑留言</label>
        <textarea name="content" id="content" ><?php echo $message['message']?></textarea>
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
</script>
</html>