<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
$id = $_GET['id'];
$sql = "select username from admin where id=$id limit 1";
$arr = oneSelect($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>更改密码</title>
    <link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>kindeditor/kindeditor-all.js"></script>
</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">管理员管理</a></li>
        <li><a href="#">管理员信息更改</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="adminAction.php?act=updatepwd&id=<?php echo $id?>"  method="post">
                <ul class="forminfo">
                    <li>
                        <label>管理员姓名<b>*</b></label>
                        <input name="username" value="<?php echo $arr['username']?>" disabled type="text" class="dfinput" style="width:518px;"/>
                    </li>
                    <li>
                        <label>管理员密码<b>*</b></label>
                        <input name="oldpwd" type="password" class="dfinput" placeholder="请填写管理员密码"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>输入新密码<b>*</b></label>
                        <input name="newpwd" type="text" class="dfinput" placeholder="请输入新密码"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>确认新密码<b>*</b></label>
                        <input name="repwd" type="text" class="dfinput" placeholder="请确认新密码"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input type="submit" class="btn" value="确认更改"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    /*$(document).ready(function(e) {
        //加载富文本编辑器
        KindEditor.ready(function(K) {
            K.create('#content', {
                allowFileManager : true,
                filterMode:true,
                afterBlur:function(){
                    this.sync("#content");
                }
            });
        });
    });*/
</script>
</html>

