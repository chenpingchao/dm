<?php
//单文件上传
echo "<pre>";
print_r( $_FILES);

if($_FILES['avater']['error'] === 0 ){
    //判断文件的大小
    if($_FILES['avater']['size'] > 4194304 ){
        exit('文件过大，请从新上传');
    }
    //判断文件的格式
    $arr = ['png','jpg','jpeg','gif'];
    $extension = pathinfo($_FILES['avater']['name'],PATHINFO_EXTENSION);
    if(!in_array($extension,$arr)){
       exit('图片格式错误');
    }
    //判断是否真正为图片
    if(!getimagesize($_FILES['avater']['tmp_name'])){
        exit('请上传图片');
    }
    //判断上传方式是否为post
    if(!is_uploaded_file($_FILES['avater']['tmp_name'])){
        exit('请用post方式上传');
    }

    //从临时文件保存到正常目录
    //判断目录是否存在
    $dir = 'upload_image';
    if(!file_exists($dir)){
        mkdir($dir);
    }
    //为文件命一个唯一的名
    $filename = md5(uniqid(mt_rand(),true)).'.'.$extension;
    //将临时文件移动到指定目录
    if(move_uploaded_file($_FILES['avater']['tmp_name'],$dir.'/'.$filename)){
        echo "文件上传成功";
    }else{
        echo "文件上传失败";
    }
}else{
    switch($_FILES['avater']['error']){
        case 1:
            $error = '上传文件超过uupload_max_filesize限制';
            break;
        case 2:
            $error = '上传文件字节数超过表单隐藏域(MAX_FILE_SIZE)限制';
            break;
        case 3:
            $error = '上传文件失败';
            break;
        case 4:
            $error = '没有选择上传文件';
            break;
        case 6:
            $error = '没有临时目录';
            break;
        case 7:
            $error = '临时目录不可写';
            break;
    }
}