<?php
//商品控制器
class goodsController extends Controller {

    //商品列表页面方法
    public function goodsList(){
        if(!$this -> isCached('goodslist.html')){
            //声明一个模型对象
            $sql = new GoodsModel();
            //获取查询结果
            $result = $sql -> getlist();
            $this -> assign("goods",$result);
        }
        $this -> display("goodslist.html");
    }
    //商品详情
    public function goodsDetail(){

        $id= $_GET['id'];

        if(!$this -> isCached("goodsdetail.html",$id)){
            echo 'xxx';
            $sql = new GoodsModel();
            $result = $sql -> getDetail($id);
            $this -> assign("detail",$result);
        }
        $this -> display("goodsdetail.html",$id);
    }
}