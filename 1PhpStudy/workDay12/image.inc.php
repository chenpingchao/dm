<?php
//打开session
session_start();


//抽取随机文字
function rand_word($type=1,$length=4,$str="我是这一个中国人是世界上最好的语言一二三四五六七"){
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
            //$keys = array_rand($arr,$length);
            //return $arr[$keys[0]].$arr[$keys[1]].$arr[$keys[2]].$arr[$keys[3]];
            return mb_substr(join('',$arr),0,$length,'utf-8');
    }
    return substr(str_shuffle($str),0,$length);
}


//封装验证码的函数
function captcha($w,$h,$length=4,$type='1' ,$size=15,$fonts =['fonts/msyh.ttf','fonts/msyhbd.ttf']){

//第一步 建一个真彩色的图像资源
    $img = imagecreatetruecolor($w,$h);

//第二步 操作图像资源
//配色
    //不透明
    //imagecolorallocate($img,0,255,255);
    //透明
    $bg_color = imagecolorallocatealpha($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255),20);
    imagesavealpha($img,true);//透明通道
//填充背景色
    imagefill($img,0,0,$bg_color);
//绘制点
    for($i=1 ; $i<=1000 ; $i++){
        $pix_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagesetpixel($img,mt_rand(0,$w),mt_rand(0,$h),$pix_color);
    }
//绘制线
    for($q=1 ;$q<=10 ; $q++){
        $line_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        $x1 = mt_rand(0,$w);
        $y1 = mt_rand(0,$h);
        imageline($img,$x1,$y1,$x1+mt_rand(10,$w),$y1+mt_rand(0,$h),$line_color);
    }
    $captcha = '';
//绘制字符
    for($a=0 ; $a<$length ; $a++){
        //调用随机打字函数
        $text = rand_word($type,1);
        $x2 = $a*($w/4)+mt_rand(10,20);
        $y2 = mt_rand($size,$h);
        $captcha .= $text;
        //字体
        $font = $fonts[mt_rand(0,count($fonts)-1)];
        $text_color =imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagettftext($img,$size,mt_rand(-40,40),$x2,$y2,$text_color,$font,$text);
    }
    $_SESSION['captcha'] = $captcha;

//第三部 输出图像资源
    header("Content-Type:image/png");
    imagepng($img);
//销毁图像资源
imagedestroy($img);
}