<?php
class page{
    public $total;
    public $curPage;
    public $pageNum;
    public $showPage;
    public $w;

    public function __construct($total,$curPage,$pageNum,$showPage,$w){
        $this->total = $total;
        $this->curPage = $curPage;
        $this->pageNum = $pageNum;
        $this->showPage = $showPage;
        $this->w = $w;
    }
    public function page(){
        //总页数
        $totalPage = ceil($this->total/$this->pageNum);
        //显示固定的页码数
        if($totalPage<$this->showPage){
            //启始页
            $starPage = 1;
            //末尾页
            $endPage = $totalPage;
        }else{
            $starPage = $this->curPage-floor($this->showPage%2==0 ? ($this->showPage-1)/2 : $this->showPage/2);
            $endPage = $this->curPage+floor($this->showPage/2);

            if($starPage<1){
                $starPage =1;
                $endPage =$starPage+$this->showPage-1;
            }
            if($endPage>$totalPage){
                $endPage = $totalPage;
                $starPage = $endPage-$this->showPage+1;
            }
        }

        //拼接字符串
        $str = '<ul class="paginList">';
    // 上一页//页数到边后进行上一页隐藏
             if($this->curPage>1){
                 $str.=' <li class="paginItem"><a href="list.php?page=1'. $this->w .'">首页</a></li>';
                 $str.='<li class="paginItem"><a href="list.php?page='.($this->curPage-1).$this->w.'"><span class="pagepre"></span></a></li>';
             }
             for($i=$starPage ; $i<=$endPage ; $i++){
                   $str.='<li class="paginItem '.($this->curPage==$i?"current" :'').'"><a href="list.php?page='.$i.$this->w.'"> '.$i.'</a></li>';
             }
             //页数到边后进行下一页隐藏
             if($this->curPage<$totalPage) {
    //        下一页
                   $str .='<li class="paginItem"><a href="list.php?page='.($this->curPage +1).$this->w .'"><span class="pagenxt"></span></a></li>';
                   $str .='<li class="paginItem"><a href="list.php?page='.($totalPage).$this->w.'">尾页</a></li>';

             }
             $str .= '</ul>';
        return $str;
    }
}

$page = new page(30,5,4,3,7);
echo $page->page();