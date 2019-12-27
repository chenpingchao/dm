<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
//查询数据库
$path = $_GET['path'];
$sql = "select * from category where path='$path' limit 1";
$arr = oneSelect($sql);


//查询数据库获取全部分类
$cate_arr = moreSelect("select * from category order by path");
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
        <li><a href="#">商品分类管理</a></li>
        <li><a href="#">更改分类信息</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="categoryAction.php?act=updateCate"  method="post">
                <input type="hidden" name="path" value="<?php echo $path?>">
                <input type="hidden" name="id" value="<?php echo $arr['id']?>">
                <ul class="forminfo">
                    <li>
                        <label>分类名称<b>*</b></label>
                        <input name="catename" value="<?php echo $arr['catename']?>" type="text" class="dfinput" style="width:300px;"/>
                    </li>
                    <li>
                        <label>分类路径<b>*</b></label>
                        <select name="pid" style="width: 300px">
                            <option value="0-0">顶级分类</option>
                            <?php
                            if($cate_arr){
                                foreach ($cate_arr as $v){
                                    //判断分类的级别
                                    $catename = count(explode(',',$v['path']));
                                    $catename = str_repeat('&emsp;&emsp;',$catename).$v['catename'];
                                    ?>
                                    <option <?php echo $v['pid']==$arr['id']?'selected':''?> value="<?php echo $v['id'].'-'.$v['path']?>" ><?php echo $catename?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
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

