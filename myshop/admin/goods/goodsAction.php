<?php

require_once "../../conf.inc.php";
include_once "../../public/libs/upload.inc.php";
require_once ROOT."/public/libs/image.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

//接受上传数据
$act = $_GET['act'];
$act();

function add(){
    $goodsname = trim($_POST['goodsname']);
    $cid = trim($_POST['cid']);
    $market_price = trim($_POST['market_price']);
    $price = trim($_POST['price']);
    $store_num = trim($_POST['store_num']);
    $deatil = trim($_POST['deatil']);
    $add_time = time();
    $image = upload(UPLOAD);
   /*echo "<pre>";
    print_r($_FILES['image']['error'][0]);
    exit();*/
    //判断主图上传是否成功
    if($_FILES['image']['error'][0] ==0 ){
         //判断主图上传是否成功
        if($image[0]['status'] == 'ok') {
            //获取图片名
            $image_file = $image[0]['filename'];
            //准备sql语句
            $sql = "insert into goods(goodsname,cid,market_price,price,image,store_num,add_time,deatil)
        value ('$goodsname',$cid,$market_price,$price,'$image_file',$store_num,$add_time,'$deatil')";
//        exit($sql);
            if($id=insert($sql)){
                //上传副图
                foreach($image as $k=>$v){
                    //判断图片上传是否成功

                    if($v['status']== 'ok'){
                        //排除主图， 副图插goods_image表中
                        if($k != 0 ){
//                            print_r($v);
                            insert("insert into goods_image(image,gid) values('{$v['filename']}',$id)");

                        }
                        //缩略图
                        //原图的路径和文件名
                        $image_file = UPLOAD.$v['filename'];
                        thumb($image_file,358,441,UPLOAD);

                    }
                }
                echo "<script>alert('商品发布成功');location = 'list.php'</script>";
            }else{
                echo "<script>alert('商品发布失败');history.back()</script>";
            }

        }else{
            echo "<script>alert('1商品主图上传失败');history.back()</script>";
        }
    }else{
        echo "<script>alert('2商品主图上传失败');history.back()</script>";
    }

}

//激活和禁用
function active(){
    $id = $_GET['id'];
    $active = $_GET['active']==1 ? 2 : 1;
    $act = $active==1 ? '上架':'下架';
    if(update("update goods set active=$active where id=$id")){
        echo "<script>alert('商品{$act}成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('商品已{$act}失败');history.back()</script>";
    }
}

//删除
function del(){
    $id = $_GET['id'];
    //删除语句
    if(delete("delete from goods where id=$id")){
        echo "<script>alert('商品删除成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('商品删除失败');history.back()</script>";
    }
}
//批量删除商品
function dels(){
    $arr =$_POST['chk'];
    $arr = join(',',$arr);
    if(delete("delete from goods where id in($arr)")){
        echo "<script>alert('商品批量删除成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('商品批量删除失败');history.back()</script>";
    }
}

//更新商品信息
function updateGoods(){
  echo "<pre>";
 /*    print_r($_POST);
    print_r($_FILES);
   exit;*/
    $id = $_POST['id'];
    $goodsname = $_POST['goodsname'];
    $cid = $_POST['cid'];
    $market_price = trim($_POST['market_price']);
    $price = trim($_POST['price']);
    $store_num = trim($_POST['store_num']);
    $deatil = trim($_POST['deatil']);
    $upload = new upload();
    $image = $upload->upload(UPLOAD);
    /*  var_dump($image[0]['status']);
      var_dump($image[0]['filename']);
      exit;    /* print_r($image);
      exit;*/
    //判断主图是否上传
    if($image[0]['status'] == 'ok'){
        $sql = "update goods set goodsname='$goodsname',cid=$cid,market_price=$market_price,price=$price,
store_num=$store_num,deatil='$deatil',image='{$image[0]['filename']}' where id=$id";
    }else{
        $sql = "update goods set goodsname='$goodsname',cid=$cid,market_price=$market_price,price=$price,
store_num=$store_num,deatil='$deatil' where id=$id";
    }
    //更新商品信息
//    var_dump($sql);
    $resoult1 = update($sql);
//exit;
    //处理副图  $k==id 图片传过来的
    foreach($image as $k=>$v){
        if($v['status'] == 'ok'){
//            print_r($v);
            //处理提交的图片
            $image_path = UPLOAD.$v['filename'];
            thumb($image_path ,800,UPLOAD);
            thumb($image_path ,500,UPLOAD);
            thumb($image_path ,100,UPLOAD);
            //更新并处理就图片
            if($k == '0'){
                //主图
                    $filename = $_POST['image'];
            }else{
    //            旧副图
                $filename = UPLOAD.(oneSelect("select image from goods_image where gid=$id limit 1")[$image]);
                //新附图
                $new_image = $v['filename'];
                $resoult2 = update("update goods_image set image='$new_image' where id=$k");
            }
            //删除旧图片
            unlink(UPLOAD.$filename);
            unlink(UPLOAD."thumb_100_".$filename);
            unlink(UPLOAD."thumb_500_".$filename);
            unlink(UPLOAD."thumb_800_".$filename);
        }
    }
    isset($resoult2)? $resoult2 : $resoult2=false;

    if($resoult1 || $resoult2){
        echo "<script>alert('商品编辑成功');location = 'list.php'</script>";
    }else{
        echo "<script>alert('商品编辑失败');history.back()</script>";
    }

}