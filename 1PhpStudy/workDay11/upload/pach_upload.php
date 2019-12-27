<?php

//封装函数
//判断函数是否执行成功
/*print_r(oneFileUpload());
echo oneFileUpload()[1];
echo oneFileUpload()[0];*/
$yes = oneFileUpload();
if($yes[0] == 'ok'){
    echo $yes[1];
}else{
    echo "服务器繁忙，请从新上传";
}
function oneFileUpload($uploadDir ='upload_image',$type =['png','jpg','jpeg','gif'],$maxSize = 1000000,$is_img=true ){
    //关联数组转为索引数组
    $arr = array_values($_FILES);
    $avate = $arr['0'];
    if($avate['error'] === 0 ){
        //判断文件的大小
        if($avate['size'] > $maxSize ){
            return ['error','文件过大，请从新上传'];
        }
        //判断文件的格式
        $extension = pathinfo($avate['name'],PATHINFO_EXTENSION);
        //判断是否为图片、
        if($is_img) {
            //判断是否真正为图片
            if(!getimagesize($avate['tmp_name'])){
                return ['aaa','上传的不是一个图片'];
            }
        }else{
            if (!in_array($extension, $type)) {
                return ['error','文件格式错误'];
            }
        }
        //判断上传方式是否为post
        if(!is_uploaded_file($avate['tmp_name'])){
            return ['error','请用post方式上传'];
        }
        //从临时文件保存到正常目录
        //判断目录是否存在
        if(!file_exists($uploadDir)){
            mkdir($uploadDir);
            chmod($uploadDir,0777);
        }
        //为文件命一个唯一的名
        $filename = md5(uniqid(mt_rand(),true)).'.'.$extension;
        //将临时文件移动到指定目录
        if(move_uploaded_file($avate['tmp_name'],$uploadDir.'/'.$filename)){
            return ['ok',"文件上传成功",'$filename'];
        }else{
            return ['error',"文件上传失败"];
        }
    }else{
        switch($avate['error']){
            case 1:
                return ['error','上传文件超过uupload_max_filesize限制'];
                break;
            case 2:
                return ['error','上传文件字节数超过表单隐藏域(MAX_FILE_SIZE)限制'];
                break;
            case 3:
                return ['error','上传文件失败'];
                break;
            case 4:
                return ['error','没有选择上传文件'];
                break;
            case 6:
                return ['error','没有临时目录'];
                break;
            case 7:
                return ['error','临时目录不可写'];
                break;
        }
    }
}