﻿<?php
require_once('../../conf.inc.php');
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>电商系统管理后台</title>
    <style>
        *{margin:0;padding:0;border:0}
        #bottom{
            position:fixed;
            bottom: 0;
        }
    </style>
    <script language="JavaScript" src="<?php echo ADMIN_SKIN ?>js/jquery.js"></script>
    <script>
        $(function(){
            function   windowSize(){
                 //计算页面的总高度
                var h=($(document).outerHeight(true)-119)+'px';
                $('#mid').css('height',h);
                var w=($(document.body).outerWidth(true)-187)+'px';
                $('#main').attr('width',w);
            }
            windowSize();
            $(window).resize(function(){
                windowSize()
            })
        })
    </script>
</head>

<iframe src="top.php" name="top" frameborder="0" width="100%" height="88" scrolling="no"></iframe>
<div id="mid">
    <iframe src="left.php" name="left" frameborder="0" width="175" height="100%" scrolling="no"></iframe>
    <iframe  id="main" src="main.php" name="main" frameborder="0"  height="100%" scrolling="scroll"></iframe>
</div>
<iframe id="bottom" src="footer.php" name="footer" frameborder="0" width="100%" height="31" scrolling="no"></iframe>

</html>
