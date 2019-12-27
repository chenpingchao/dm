<?php
//百僧吃百馍
//大和尚数量
for($a = 0; $a<= 100; $a++){
//    小和尚量
    for($b = 0; $b<= 100; $b++){
//        共计百人
        if(100 == $a + $b){
//            共计百馍
            if(100 == $a*3 + (1/3)*$b){
                echo $a."<br>";
                echo $b;
            }
        }
    }
}
echo "<hr>";
//百钱买百鸡
//大鸡数量
for($x=0 ; $x<=100 ; $x++){
    //母鸡数
    for($y=0 ; $y<=100 ; $y++){
//        小鸡数
        for($z=0 ; $z<=100 ; $z++){
//            一百只鸡
            if(100 == $x + $y + $z){
//              一百元
                if(100 == 5*$x + 3*$y + (1/3)*$z){
                    echo $x."<br>";
                    echo $y."<br>";
                    echo $z."<br>";
                    echo "<hr>";
                }
            }
        }
    }
}
echo "<hr>";
//交保护费
echo "保护费";
echo "<br>";
//总钱数
$money = 100000 ;
for($i = 1 ; $i<100 ; $i++) {
    if ( $money > 50000 ) { //5万以上
        $money -= $money * 0.05;
    } else if( $money >= 5000 ){//五千以上
        $money -= 5000;
    }else{//五千以下
        break;
    }
    echo $i."<br>";
}
echo "<hr>";

echo "金字塔";
echo "<br>";
$rows = 6;//请输入想打印的层数
//行数
for($row=0 ; $row<=$rows ; $row++ ){
//    列数
//    答应空格
    for($col=0 ; $col<($rows-$row) ; $col++){
        echo "&emsp;";
    }
//    打印金字
    for($jin=0 ; $jin<(2*$row-1) ; $jin++) {
        $number = "金";
        echo $number;
    }
    echo "<br>";
}

//乘法口诀表
//行数
for($row1=1 ; $row1<=9 ; $row1++){
//    列数
    for($col1=1 ; $col1<=$row1; $col1++){
        echo $col1."&times;".$row1."=".$row1*$col1.( $col1*$row1<10 ? "&ensp;&ensp;" : "&ensp;");
    }
    echo "<br>";
}