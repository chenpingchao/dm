<?php
require_once "../../conf.inc.php";

if(empty($_SESSION['aid'])){
    header("location:../index.php");
}
//查询所有的分类】
$cate = moreSelect("select * from category order by path ")

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品添加</title>
    <link href="<?php echo ADMIN_SKIN?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_SKIN?>kindeditor/kindeditor-all.js"></script>
</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">商品管理</a></li>
        <li><a href="#">添加商品</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="goodsAction.php?act=add" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
                <li>
                    <label>商品名称<b>*</b></label>
                    <input name="goodsname" type="text" class="dfinput" placeholder="请填写商品名称"  style="width:518px;"/>
                </li>
                <li>
                    <label>商品分类<b>*</b></label>
                    <select style="width: 344px" name="cid">
                        <?php
                        if($cate){
                            foreach($cate as $v){
                                $s = count(explode(',',$v['path']));
                                $path = str_repeat('&emsp;&emsp;',$s).$v['catename'];
                        ?>
                        <option value="<?php echo $v['id']?>"><?php echo $path?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </li>
                <li>
                    <label>市场价格<b>*</b></label>
                    <input name="market_price" type="text" class="dfinput" placeholder="请填写市场价格"  style="width:518px;"/>
                </li>
                <li>
                    <label>销售价格<b>*</b></label>
                    <input name="price" type="text" class="dfinput" placeholder="请填写销售价格"  style="width:518px;"/>
                </li>
                <li>
                    <label>商品库存<b>*</b></label>
                    <input name="store_num" type="text" class="dfinput" placeholder="请填写商品库存"  style="width:518px;"/>
                </li>
                <li>
                    <label>商品主图<b>*</b></label>
                    <input type="file" name="image[]"  placeholder="请上传商品主要图片" style="width:518px;"/>
                </li>

                <li>
                    <label>商品附图<b>*</b></label>
                    <input type="file" name="image[]"  placeholder="请上传商品图片" style="width:518px;"/>
                    <input type="file" name="image[]"  placeholder="请上传商品图片" style="width:518px;"/>
                    <input type="file" name="image[]"  placeholder="请上传商品图片" style="width:518px;"/>
                </li>

                <li>
                    <label>商品详情<b>*</b></label>
                    <textarea id="content" name="deatil" style="width:700px;height:250px;"></textarea>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input type="submit" class="btn" value="立即提交"/>
                </li>
            </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    
</script>
</html>

