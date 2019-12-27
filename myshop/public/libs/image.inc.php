<?php

//取随机长度的字符串
//$type代表返回的字符串类型 1表示纯数字  2表示小写字母  3表示大写字母 4表示大小写混合 5表示字母和数字混合 6表示汉字
function get_rand_str($type=1,$length=4,$str="我是这一个中国人是世界上最好的语言一二三四五六七"){
    switch($type){
        case 1:
            $str = join('',range(0,9));
            break;
        case 2:
            $str = join('',range('a','z'));
            break;
        case 3:
            $str = join('',range('A','Z'));
            break;
        case 4:
            $str = join('',array_merge( range('a','z'),range('A','Z') ));
            break;
        case 5:
            $str = join('',array_merge( range('a','z'),range('A','Z'),range(0,9) ));
            break;
        case 6:
            $arr = str_split($str,3);
            shuffle($arr);
            return mb_substr(join('',$arr),0,$length,'utf-8');
    }

    return substr(str_shuffle($str),0,$length);
}
/**验证码函数
 * @param int $w 宽度
 * @param int $h 高度
 * @param float $size 文字大小
 * @param int $length 长度
 * @param int $type 类型  1表示纯数字  2表示小写字母  3表示大写字母 4表示大小写混合 5表示字母和数字混合 6表示汉字
 * @param string $str 汉字字符集
 * @param array $fonts 字体数组
*/
function captcha($w,$h,$length=4,$type=1,$str='',$size=14,$fonts=['fonts/msyh.ttf','fonts/msyhbd.ttf','fonts/simkai.ttf']){
    //第一步：创建画布，获取图像资源
    $img = imagecreatetruecolor($w,$h);
    //第二步：操作图像资源
     //1.分配颜色，设置背景(浅色)
     $bg_color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
     imagefill($img,0,0,$bg_color);
     //2.画点
     for($i=1;$i<=100;$i++){
         $pixel_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
         imagesetpixel($img,mt_rand(0,$w),mt_rand(0,$h),$pixel_color);
     }
     //3.画线
     for($n=1;$n<=10;$n++){
         $line_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
         $line_x = mt_rand(0,$w);
         $line_y = mt_rand(0,$h);
         imageline($img,$line_x,$line_y,$line_x+mt_rand(5,$w),$line_y+mt_rand(5,$h),$line_color);
     }
     //4.写文字
     $captcha = '';
     for($c=0;$c<$length;$c++){
         //文字的位置
         $x = $c*($w/$length)+mt_rand(5,10);
         $y = mt_rand($size,$h);
         //文字的颜色
         $text_color = imagecolorallocate($img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
         //字体
         $font = $fonts[mt_rand(0,count($fonts)-1)];
         //文字
         $text = get_rand_str($type,1,$str);
         $captcha .=  $text;
         //绘制文字
         imagettftext($img,$size,mt_rand(-20,20),$x,$y,$text_color,$font,$text);
     }

     //要将生成的验证码字符串存在服务器上（通过session来保存）
     $_SESSION['captcha'] = $captcha;

    //第三步：输出图像
    header("Content-Type:image/png");
    imagepng($img);
    //第四步：销毁图像资源，释放内存
    imagedestroy($img);
}

//文字水印
function textWater($des_img,$text,$size=28,$angle=0,$x=0,$y=0,$color=[255,0,0],$font="fonts/msyhbd.ttf",$dir='upload'){
   //第一步：将图片转换为图像资源
    //获取图片的信息
    $img_info = getimagesize($des_img);  //[0] => 992表示宽度  [1] => 462表示高度  [2] => 3 表示类型

    //获取图片真实的扩展名
    $extension = image_type_to_extension($img_info[2],false);

    //拼接函数名字符串
    $fun1 = 'imagecreatefrom'.$extension;

    //将图片转换为图像资源
    $img = $fun1($des_img);

   //第二步：操作图像资源，将水印文字写入图像
   $img_color = imagecolorallocate($img,$color[0],$color[1],$color[2]);
   imagettftext($img,$size,$angle,$x,$y+$size,$img_color,$font,$text);

   //第三步：保存图像资源到指定目录
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir,0777);
    }
    $fun2 = 'image'.$extension;
    $fun2($img,$dir.'/text_water_'.basename($des_img));

   //第四步：销毁图像资源，释放内存
    imagedestroy($img);

}
//textWater('test.jpg','京东商城');
//图片水印
function imageWater($des_img,$water_img,$x=0,$y=0,$alpha=30,$dir='upload'){
    //由目标图像产生目标图像资源
    $img1_info = getimagesize($des_img);
    $extension1 = image_type_to_extension($img1_info[2],false);
    $fun1 = 'imagecreatefrom'.$extension1;
    $img1 = $fun1($des_img);

    //由水印图片产生水印图像资源
    $img2_info = getimagesize($water_img);
    $extension2 = image_type_to_extension($img2_info[2],false);
    $fun2 = 'imagecreatefrom'.$extension2;
    $img2 = $fun2($water_img);

    //拷贝合并图像资源，将水印图像拷贝到大图的指定位置并合并
    imagecopymerge($img1,$img2,$x,$y,0,0,$img2_info[0],$img2_info[1],$alpha);

    //将图像保存到指定目录
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir,0777);
    }
    $fun3 = 'image'.$extension1;
    $fun3($img1,$dir.'/image_water_'.basename($des_img));

    //销毁图像资源，释放内存
    imagedestroy($img1);
    imagedestroy($img2);
}

//imageWater('test.jpg','logo.png');

//等比缩放
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

//thumb('test.jpg',500);
//thumb('test.jpg',300);
//thumb('test.jpg',100);
//thumb('test.jpg',50);


//剪裁
function cut($src_img,$x,$y,$w,$h,$dir='upload'){

    //由源图片(大图)来生成图像资源
    $src_info = getimagesize($src_img);
    $src_extension = image_type_to_extension($src_info[2],false);
    $fun1 = 'imagecreatefrom'.$src_extension;
    $src_img_resource = $fun1($src_img);

    //创建画布，生成小图的图像资源

    //生成小图图像资源
    $small_img_resource = imagecreatetruecolor($w,$h);

    //将大图剪裁的部分放到小图资源中
    imagecopyresampled($small_img_resource,$src_img_resource,0,0,$x,$y,$w,$h,$w,$h);

    //保存小图到指定目录
    if(!file_exists($dir)){
        mkdir($dir);
        chmod($dir,0777);
    }
    $fun2 = 'image'.$src_extension;
    $fun2($small_img_resource,$dir."/cut_{$w}_{$h}_".basename($src_img));

    //销毁图像资源，释放内存
    imagedestroy($src_img_resource);
    imagedestroy($small_img_resource);
}



