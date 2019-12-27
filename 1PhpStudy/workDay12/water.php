<?php
//文字水印
//textWater('hate.jpg','我可以划船不用桨，全靠浪');
function textWater($img,$text,$x=0,$y=0,$size = 50,$angle=0,$fonts ='msyh.ttf' ,$color=[255,0,0],$dir='water'){
// 一 创建图片资源
    //获取图片的信息
    $img_info = getimagesize($img);
    //获得图片的扩展名
    $extension = image_type_to_extension($img_info[2],false);
 /*   switch($extension){
        case 'png': imagecreatefrompng()  ;break;
        case 'jpeg': imagecreatefromjpep()  ;break;
        case 'gif': imagecreatefromgif()  ;break;
    }*/
    //拼接函数
    $imgfun = "imagecreatefrom".$extension;
    //创建文件图片资源
    $img_hosult = $imgfun($img);
//二操作图像资源
    $txt_color = imagecolorallocate($img_hosult,$color['0'],$color['1'],$color['2']);
    //绘制字符
    imagettftext($img_hosult,$size,$angle,$x,$y+$size,$txt_color,$fonts,$text);
//三，保存到指定的文件
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir,0777);
    }
    $fun1 = "image".$extension;
    $fun1($img_hosult,$dir.'/'.'write_'.basename($img));
//四，销毁图片资源，清理缓存
    imagedestroy($img_hosult);
}

//图片水印
//imgWater('hate.jpg','hate1.jpg');
function imgWater($big_img,$small_img,$big_x =0,$big_y =0,$pct = 50,$dir='water'){
    //创建大图片的图像资源
    $big_img_info = getimagesize($big_img);
    $big_img_extension = image_type_to_extension($big_img_info[2],false);
    $big_img_fun = "imagecreatefrom".$big_img_extension;
    $big_img_hosult = $big_img_fun($big_img);
    //创建小图片的图像资源
    $small_img_info = getimagesize($small_img);
    $small_img_extension = image_type_to_extension($small_img_info[2],false);
    $small_img_fun = "imagecreatefrom".$small_img_extension;
    $small_img_hosult =$small_img_fun($small_img);
    //操作图片形成水印图片
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir,0777);
    }
    imagecopymerge($big_img_hosult,$small_img_hosult,$big_x,$big_y,0,0,$small_img_info[0],$small_img_info[1],$pct);
    //图片给保存到指定位置
    $fun2 = 'image'.$big_img_extension;
    $fun2($big_img_hosult,$dir.'/'."img_water_".basename($big_img));
    //销毁图片资源，释放内存
    imagedestroy($big_img_hosult);
    imagedestroy($small_img_hosult);
}

//调用函数
zoom('hate1.jpg',1600);
//封装缩放图片
function zoom($art_img,$w,$dir = 'water'){
    //获取图片资源
    $art_img_info = getimagesize($art_img);
    $art_img_extension = image_type_to_extension($art_img_info[2],false);
    $art_img_fun = "imagecreatefrom".$art_img_extension;
    $art_img_hosult =$art_img_fun($art_img);
    //目标图像的高
    $h = $w/($art_img_info[0]/$art_img_info[1]);
    //创建新真彩色资源
    $dst_img = imagecreatetruecolor($w,$h);
    //缩小图片
    imagecopyresampled($dst_img,$art_img_hosult,0,0,0,0,$w,$h,$art_img_info[0],$art_img_info[1]);
    //将资源保存在目录中
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir ,0777);
    }
    $fun3 = 'image'.$art_img_extension;
    $h = round($h);
    $fun3($dst_img,$dir."/"."zoom_{$w}_{$h}_".basename($art_img));
    //销毁图片资源，释放内存
    imagedestroy($art_img_hosult);
    imagedestroy($dst_img);
}

