<?php
require_once "../../conf.inc.php";

if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

//查询所有的分类
$cate = moreSelect("select * from category order by path ");

//接受url传的信息
$id = $_GET['id'];
//查询商品的信息
$goods = oneSelect("select * from goods where id=$id");
//查询出该商品的副图
$images = moreSelect("select * from goods_image where gid=$id");
/*echo "<pre>";
print_r($cate);
print_r($goods);
print_r($images);
exit;*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品信息更改</title>
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
        <li><a href="#">信息添加</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="goodsAction.php?act=updateGoods" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $goods['id']?>">
                <input type="hidden" name="image" value="<?php echo $goods['image']?>">
                <ul class="forminfo">
                    <li>
                        <label>商品名称<b>*</b></label>
                        <input name="goodsname" value="<?php echo $goods['goodsname']?>" type="text" class="dfinput" placeholder="请填写商品名称"  style="width:518px;"/>
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
                                    <option value="<?php echo $v['id']?>" <?php echo $v['id']==$goods['cid']?'selected' :''; ?>><?php echo $path?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label>市场价格<b>*</b></label>
                        <input name="market_price" value="<?php echo $goods['market_price']?>" type="text" class="dfinput" placeholder="请填写市场价格"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>销售价格<b>*</b></label>
                        <input name="price" value="<?php echo $goods['price']?>" type="text" class="dfinput" placeholder="请填写销售价格"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>商品库存<b>*</b></label>
                        <input name="store_num" value="<?php echo $goods['store_num']?>" type="text" class="dfinput" placeholder="请填写商品库存"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>商品主图<b>*</b></label>
                        <img src="/upload/thumb_100_<?php echo $goods['image']?>" alt="" ></img>
                        <input type="file" name="image[]"  placeholder="请上传商品主要图片" style="width:518px;"/>
                    </li>

                    <li>
                        <label>商品附图<b>*</b></label>
                        <?php 
                        if($images){
                            foreach($images as $v){
//                                echo "/upload/thumb_100_".$v['image'];
                        ?>
                         <img src="/upload/thumb_100_<?php echo $v['image']?>" alt="">
                        <input type="file" name="image[<?php echo $v['id']?>]"  placeholder="请上传商品图片" style="width:518px;"/>
                        <?php
                            }
                        }
                        ?>
                    </li>

                    <li>
                        <label>商品详情<b>*</b></label>
                        <textarea id="content" name="deatil" style="width:700px;height:250px;"><?php echo $goods['deatil']?></textarea>
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
    $(document).ready(function(e) {
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
    });
</script>
</html>

