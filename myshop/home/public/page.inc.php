<?php

function page($total,$curPage,$pageNum,$showPage,$w){

    //总页数
    $totalPage = ceil($total/$pageNum);

//显示固定的页码数
    if($totalPage<$showPage){
        //启始页
        $starPage = 1;
        //末尾页
        $endPage = $totalPage;
    }else{
        $starPage = $curPage-floor($showPage%2==0 ? ($showPage-1)/2 : $showPage/2);
        $endPage = $curPage+floor($showPage/2);

        if($starPage<1){
            $starPage =1;
            $endPage =$starPage+$showPage-1;
        }
        if($endPage>$totalPage){
            $endPage = $totalPage;
            $starPage = $endPage-$showPage+1;
        }
    }

    //拼接字符串
    $str = '<ul class="paginList">';
// 上一页//页数到边后进行上一页隐藏
         if($curPage>1){
             $str.=' <li class="paginItem"><a href=orderlist.php?page=1'. $w .'">首页</a></li>';
             $str.='<li class="paginItem"><a href="orderlist.php?page='.($curPage-1).$w.'"><span class="pagepre"></span></a></li>';
         }
         for($i=$starPage ; $i<=$endPage ; $i++){
               $str.='<li class="paginItem '.($curPage==$i?"current" :'').'"><a href="orderlist.php?page='.$i.$w.'"> '.$i.'</a></li>';
         }
         //页数到边后进行下一页隐藏
         if($curPage<$totalPage) {
//        下一页
               $str .='<li class="paginItem"><a href="orderlist.php?page='.($curPage +1).$w .'"><span class="pagenxt"></span></a></li>';
               $str .='<li class="paginItem"><a href="orderlist.php?page='.($totalPage).$w.'">尾页</a></li>';

         }
         $str .= '</ul>';

    return $str;


}