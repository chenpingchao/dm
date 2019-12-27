<?php

//$file = $_FILES('image');
//var_dump($_FILES);
$file = upload();

$image_path = 'upload'.'/'.$file[0]['filename'];
print_r($image_path);
thumb($image_path,358,441);



function upload($upload_dir='upload',$max_size=1048576,$type=['png','gif','jpg','jpeg'],$is_img=true){

    //统一不同表单的数组格式
    foreach($_FILES as $k1=>$v1){
        if(is_array($v1['name'])){
            //把三维转为二维
            foreach($v1['name'] as $k2=>$v2){
                $arr[$k2]['name'] = $v2;
                $arr[$k2]['type'] = $v1['type'][$k2];
                $arr[$k2]['tmp_name'] = $v1['tmp_name'][$k2];
                $arr[$k2]['error'] = $v1['error'][$k2];
                $arr[$k2]['size'] = $v1['size'][$k2];
            }
        }else{
            //因为上传的表单的name值根据需求可以不相同，所以需要将接收到的$_FILES转换为索引数组
            $arr = array_values($_FILES);
        }
    }

    //print_r($arr);
    foreach($arr as $k=>$v){
        //判断文件是否上传成功
        if($v['error'] === 0){
            //上传成功
            //判断文件大小是否超过了限制
            $size = $v['size'];
            if($size > $max_size){
                $result[$k] = ['status'=>'error','msg'=>'文件大小超过1M'];
                continue;
            }
            //判断文件类型是否正确
            $extension = pathinfo($v['name'],PATHINFO_EXTENSION);
            $tmp_name = $v['tmp_name'];
            if($is_img){
                //如果想判断是否是一个真正的图片，可以使用getimagesize函数
                if(!getimagesize($tmp_name)){
                    $result[$k] = ['status'=>'error','msg'=>'上传的不是一个图片'];
                    continue;
                }
            }else{
                if(!in_array($extension,$type)){
                    $result[$k] =  ['status'=>'error','msg'=>'文件类型不正确'];
                    continue;
                }
            }

            //判断是否为POST
            if(!is_uploaded_file($tmp_name)){
                $result[$k] =  ['status'=>'error','msg'=>'文件上传方式不合法'];
                continue;
            }

            //将文件从临时目录移动到指定的目录
            //保存文件的目录
            if(!file_exists($upload_dir)){
                mkdir($upload_dir);
                chmod($upload_dir,'0777');
            }
            //保存时的唯一的文件名称
            $filename = md5(uniqid(mt_rand(),true)).'.'.$extension;
            //移动文件到指定目录
            if(move_uploaded_file( $tmp_name , $upload_dir.'/'.$filename) ){

                $result[$k] =   ['status'=>'ok','msg'=>'文件上传成功','filename'=>$filename];
            }else{
                $result[$k] =  ['status'=>'error','msg'=>'文件上传失败'];
            }

        }else{
            //上传失败
            switch($v['error']){
                case 1:
                    $msg = '上传文件字节数超过upload_max_filesize的限制';
                    break;
                case 2:
                    $msg = '上传文件字节数超过表单隐藏域(MAX_FILE_SIZE)的限制';
                    break;
                case 3:
                    $msg = '文件部分被上传';
                    break;
                case 4:
                    $msg = '没有选择要上传的文件';
                    break;
                case 6:
                    $msg = '没有临时目录';
                    break;
                case 7:
                    $msg = '临时目录没有权限';
            }
            $result[$k] = ['status'=>'error','msg'=>$msg];
        }
    }

    return $result;
}
function thumb($src_img,$w,$h,$dir='upload'){

//由源图片(大图)来生成图像资源
$src_info = getimagesize($src_img);
$src_extension = image_type_to_extension($src_info[2],false);
$fun1 = 'imagecreatefrom'.$src_extension;
$src_img_resource = $fun1($src_img);

//创建画布，生成小图的图像资源
//真实图片宽高比例
$scale = $src_info[0]/$src_info[1];
//目标小图的高度
//    $h = $w/$scale;
//生成小图图像资源
$thumb_img_resource = imagecreatetruecolor($w,$h);

//将大图缩放为小图
imagecopyresampled($thumb_img_resource,$src_img_resource,0,0,0,0,$w,$h,$src_info[0],$src_info[1]);

//保存小图到指定目录
if(!file_exists($dir)){
mkdir($dir);
chmod($dir,0777);
}
$fun2 = 'image'.$src_extension;
$fun2($thumb_img_resource,$dir."/thumb_{$w}_".basename($src_img));

//销毁图像资源，释放内存
imagedestroy($src_img_resource);
imagedestroy($thumb_img_resource);
}

?>

