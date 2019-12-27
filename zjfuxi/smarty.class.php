<?php
//自定义模板引擎
class Smarty{
    //替换内容的存储
    public $ass = [];
    //设置替换内容
    public function assign($name,$data){
        $this -> ass[$name] = $data;
    }

    //开始替换
    public function display($URL){
        //确认模板的地址
        $templates = "templates/$URL";
        //设定编译文件存储地址
        $templates_c = "templates_c/$URL".".php";
        if(!file_exists($templates_c) ||  filemtime($templates_c)<filemtime($templates) ){
            //替换数据
            $regex = '/\{\s*\$([A-Za-z_]\w*)\s*\}/';
            //要替换的内容
            $replace = '<?php echo $this -> ass["\\1"];?>';
            //打开模板文件
            $tplfile = file_get_contents($templates);
            //正则替换
            $file = preg_replace($regex,$replace,$tplfile);
            //将修改完的数据存入文件中
           file_put_contents($templates_c,$file);
        }
        require_once $templates_c;

    }
}