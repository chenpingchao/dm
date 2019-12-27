<?php

class Smarty{
    private $data = [];
    //向模板分配变量
    public function assign($name,$value){
        $this -> data[$name] = $value;
    }
    //将模板和php代码结合
    public function display($tplname){
        //模板文件路径和文件名
        $tpl_name = 'templates/'.$tplname;
        //生成混合页面后保存在tpl_c中
        $tpl_c = "templates_c/".$tplname.".php";
        //判断templates_c中是否有文件并且修改时间是否大于模板修改时间
        if(!file_exists($tpl_c) || filemtime($tpl_name)>filemtime($tpl_c)){
            //打开html文件生成字符串
            $tpl_file = file_get_contents($tpl_name);
            //正则匹配所有的smarty变量
            $regex = '/\{\s*\$([a-zA-Z_]\w*)\s*\}/';
            //要替换的数据
            $replace = '<?php echo $this -> data["\\1"] ?>';
            //正则替换
            $tpl_c_file = preg_replace($regex,$replace,$tpl_file);
            //将替换后的数据写入templates_c文件夹中
            file_put_contents($tpl_c,$tpl_c_file);
        }
        //引用templates中的混合页面
        require_once $tpl_c;
    }
}