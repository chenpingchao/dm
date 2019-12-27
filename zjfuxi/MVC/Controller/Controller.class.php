<?php
//基础控制器，要被所有的控制器继承,同时继承smarty类
class Controller extends Smarty{
    //构造方法，实例化一个对象，或实例化一个子类的对象时，都要在实例化时自动启动
    public function __construct(){
        //父类的构造方法要申明，以防被重写
        parent::__construct();
        //初始化Smarty的参数(模板的位置和编译文件的位置)
        $this -> setTemplateDir(ROOT."View/")
              -> setCompileDir(ROOT."View_c/");
        //启用smarty缓存机制
        $this -> caching = 1;
        $this -> setCacheDir(ROOT."cache/");
        $this -> cache_lifetime = 86400;
        //接受页面get请求
        $a = isset($_GET['a']) ? $_GET['a'] : "index";
        //找寻类中是否有该方法(在子类中$this指的是当前子类)
        if(method_exists($this,$a)){
            //调用该方法
            $this -> $a();
        }else{
            //不存在
            exit("你要的页面不存在");
        }
    }

}