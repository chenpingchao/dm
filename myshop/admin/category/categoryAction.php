<?php
require_once "../../conf.inc.php";
if(empty($_SESSION['aid'])){
    header("location:../index.php");
}

$act = $_GET['act'];
$act();

//添加商品分类
function add(){
    $catename = trim($_POST['catename']);
    $pid = explode('-',$_POST['pid'])[0];
    $path = explode('-',$_POST['pid'])[1];
  /*  echo $catename;
    echo $pid;
    echo $path;*/
    if(empty($catename)){
        echo "<script>alert('分类名不能为空');history.back();</script>";
        exit;
    }
    if(oneSelect("select id from categroy where pid=$pid and catename='$catename'")){
        echo "<script>alert('该分类已存在');history.back();</script>";
    }else {

        //插入分类的sql语句
        $sql = "insert into category(catename,pid) value ('$catename','$pid')";
        $id = insert($sql);
        if (empty($id)) {
            echo "<script>alert('分类添加失败');history.back();</script>";
        } else {
            $path = $pid==0 ? $id : $path.','.$id;
            if (update("update category set path='$path' where id=$id")){
                    echo "<script>alert('分类添加成功');location='list.php';</script>";
            }else {
                echo "<script>alert('分类添加失败');history.back();</script>";
            }

        }
    }
}

//激活和禁用、
function active(){
    $active = $_GET['active']==1 ? 2 : 1 ;
    $path = $_GET['path'];
    $act = $active==1 ? '激活':'禁用';
//    var_dump("update category set active=$active where path like'$path%'");
//    exit;
    if(update("update category set active=$active where path='$path' or path like '$path%'")){
        echo "<script>alert('商品分类{$act}成功');location='list.php'</script>";
    }else{
        echo "<script>alert('商品分类{$act}失败');history.back();</script>";
    }

}

//删除改分类
function del(){
    $path = $_GET['path'];
    $sql = "delete from category where path='$path' or path like '$path%'";
    if(delete($sql)){
        echo "<script>alert('商品分类删除成功');location='list.php';</script>";
    }else{
        echo "<script>alert('商品分类删除失败');history.back();</script>";
    }
}

//更改分类的路径    1号方法
/*function updateCate(){
    //要更改的分类的名称
    $catename = $_POST['catename'];
    //要更改的分类的path
    $old_path = $_POST['path'];
    //要更改的分类的id
//    $id = array_pop(explode(',',$old_path));
    $id = $_POST['id'];
    //目标类的id
    $pid = explode('-', $_POST['pid'])[0];
    //目标的path
    $father_path = explode('-', $_POST['pid'])[1];
    //新的路径
    $path = $pid == 0 ? $id : $father_path . ',' . $id;
    //更新信息
    if (update("update category set catename='$catename',pid=$pid,path='$path' where id=$id")) {
        //判断下面是否还有子分类
        if(oneSelect("select id from category where pid=$id")) {
            //把所有的子类从数据库中抽出  所有分类的路径
            $all_path = moreSelect("select path from category where path like '$old_path,%'");
            /*echo "<pre>";
            print_r($all_path);
            exit;
            //遍历所有的数组
            $a = 0;
            foreach($all_path as $v){
                //单个分类的路径
                $one_path = $v['path'];
                //截取后的路径
                $sub_path = strstr($one_path,$id);
                //新的路径
                $new_path = $father_path==0?$sub_path : $father_path.','.$sub_path;
                //塞入数据库
                $a += update("update category set path='$new_path'");
            }
            if($a==oneSelect("select count(id) from category where path like '$path,%'")){
                echo "<script>alert('分类更1新成功');location = 'list.php';</script>";
            }else{
                echo "<script>alert('分类更2新失败');history.back();</script>";
            }
        }else{
            echo "<script>alert('分类更3新成功');location = 'list.php';</script>";
        }
    } else {
        echo "<script>alert('分类更4新失败');history.back();</script>";
    }

}*/
//更改路径 2号方案
function updateCate(){
    //获取提交的信息
    $old_path = $_POST['path'];
    $catename = $_POST['catename'];
    $id = $_POST['id'];
    //新的父类ID
    $pid = explode('-',$_POST['pid'])[0];
    //新的父类的路径
    $father_path = explode('-',$_POST['pid'])[1];
    //新路径
    $path = $pid==0 ? $id : $father_path.','.$id;
    //更新信息
    if(update("update category set catename='$catename',pid=$pid,path='$path' where path='$old_path'")){
        //判断分类下是否还有分类
        if(oneSelect("select id from category where pid=$id")){
            //更新子分类
            if(update("update category set path=replace(path,'$old_path,','$path,') where path like '$old_path,%'")){
                echo "<script>alert('商品分类更新1成功');location= 'list.php';</script>";
            }else{
                echo "<script>alert('商品分类更2新失败');history.back();</script>";
            }
        }else{
            echo "<script>alert('商品分类更新3成功');location= 'list.php';</script>";
        }
    }else{
        echo "<script>alert('商品分类更新4失败');history.back();</script>";
    }
}