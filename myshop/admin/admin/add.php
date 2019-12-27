<?php 
    require_once "../../conf.inc.php";

if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>
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
            <li><a href="#">添加管理员</a></li>
        </ul>
    </div>
   
    <div class="formbody">
         <div id="usual1" class="usual"> 
  	         <div id="tab1" class="tabson">
                 <form action="adminAction.php?act=add" method="post">
                 <ul class="forminfo">
                     <li>
                            <label>管理员姓名<b>*</b></label>
                            <input name="username" type="text" class="dfinput" placeholder="请填写管理员姓名"  style="width:518px;"/>
                     </li>
                     <li>
                         <label>管理员密码<b>*</b></label>
                         <input name="password" type="password" class="dfinput" placeholder="请填写管理员密码"  style="width:518px;"/>
                     </li>
                     <li>
                         <label>确&nbsp;认&nbsp;密&nbsp;码<b>*</b></label>
                         <input name="repwd" type="text" class="dfinput" placeholder="请确认管理员密码"  style="width:518px;"/>
                     </li>
                     <li>
                            <label>&nbsp;</label>
                            <input type="submit" class="btn" value="确认添加"/>
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
