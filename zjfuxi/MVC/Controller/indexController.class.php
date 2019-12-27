<?php
//主页控制器
class indexController extends Controller{

    //主页面方法
    public function index(){
        $this -> assign('title','首页');
        $this -> display("index.html");
    }
}