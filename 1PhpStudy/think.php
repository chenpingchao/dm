<?php
//回文数（失败）
$arr[] = null;
function hw($x,$y){
    global $arr;
//    遍历
    for ($i = $x; $i <= $y; $i++) {
        $a = strlen((string)$i);
//        echo $a.'<br>';
        for ($n = 0; $n < $a; $n++) {
            if ($n < $a-$n ) {
//            对比数值是否一样
               $b = substr($i, $n, 1);
               $c = substr($i, $a-$n-1, 1);
 //                判断是否能进入
                if ($b == $c ) {
                     $arr[] = $i;
                 }
            }
        }
    }
    return $arr;
}
hw(1,1000);
print_r($arr);

