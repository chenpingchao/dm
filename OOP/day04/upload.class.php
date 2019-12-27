<?php
//print_r($_FILES);print_r(upload());
/*功能描述:文件上传
 * @param   $upload_dir  上传文件保存的目录
 * @param   $max_size    上传文件允许最大字节
 * @param   $type        上传文件允许的类型
 * @param   $is_img      上传文件是否为图片类型
 * @return  $result
 * */
class upload{
    public $upload_dir;
    public $max_size;
    public $type;
    public $is_img;

    //构造函数
    public function __construct($upload_dir='upload',$max_size=1048576,$type=['png','gif','jpg','jpeg'],$is_img=true){
        $this->upload_dir = $upload_dir;
        $this->max_size = $max_size;
        $this->type = $type;
        $this->is_img = $is_img;
    }
    public function upload(){
        //统一不同表单的数组格式
        foreach($_FILES as $k1=>$v1){
            if(is_array($v1['name'])){
                //把三维转为二维
                foreach($v1['name'] as $k2=>$v2){
                    $arr[$k2]['name'] = $v2;
                    $arr[$k2]['type'] = $v1['type'][$k2];
                    $arr[$k2]['tmp_name'] = $v1['tmp_name'][$k2];
                    $arr[$k2]['error'] = $v1['error'][$k2];
                    $arr[$k2]['size'] = $v1['size'][$k2];
                }
            }else{
                //因为上传的表单的name值根据需求可以不相同，所以需要将接收到的$_FILES转换为索引数组
                $arr = array_values($_FILES);
            }
        }
        var_dump($_FILES);
        //print_r($arr);
        foreach($arr as $k=>$v){
            //判断文件是否上传成功
            if($v['error'] === 0){
                //上传成功
                //判断文件大小是否超过了限制
                $size = $v['size'];
                if($size > $this->max_size){
                    $result[$k] = ['status'=>'error','msg'=>'文件大小超过1M'];
                    continue;
                }
                //判断文件类型是否正确
                $extension = pathinfo($v['name'],PATHINFO_EXTENSION);
                $tmp_name = $v['tmp_name'];
                if($this->is_img){
                    //如果想判断是否是一个真正的图片，可以使用getimagesize函数
                    if(!getimagesize($tmp_name)){
                        $result[$k] = ['status'=>'error','msg'=>'上传的不是一个图片'];
                        continue;
                    }
                }else{
                    if(!in_array($extension,$this->type)){
                        $result[$k] =  ['status'=>'error','msg'=>'文件类型不正确'];
                        continue;
                    }
                }

                //判断是否为POST
                if(!is_uploaded_file($tmp_name)){
                    $result[$k] =  ['status'=>'error','msg'=>'文件上传方式不合法'];
                    continue;
                }

                //将文件从临时目录移动到指定的目录
                //保存文件的目录
                if(!file_exists($this->upload_dir)){
                    mkdir($this->upload_dir);
                    chmod($this->upload_dir,'0777');
                }
                //保存时的唯一的文件名称
                $filename = md5(uniqid(mt_rand(),true)).'.'.$extension;
                //移动文件到指定目录
                if(move_uploaded_file( $tmp_name , $this->upload_dir.'/'.$filename) ){

                    $result[$k] =   ['status'=>'ok','msg'=>'文件上传成功','filename'=>$filename];
                }else{
                    $result[$k] =  ['status'=>'error','msg'=>'文件上传失败'];
                }

            }else{
                //上传失败
                switch($v['error']){
                    case 1:
                        $msg = '上传文件字节数超过upload_max_filesize的限制';
                        break;
                    case 2:
                        $msg = '上传文件字节数超过表单隐藏域(MAX_FILE_SIZE)的限制';
                        break;
                    case 3:
                        $msg = '文件部分被上传';
                        break;
                    case 4:
                        $msg = '没有选择要上传的文件';
                        break;
                    case 6:
                        $msg = '没有临时目录';
                        break;
                    case 7:
                        $msg = '临时目录没有权限';
                }
                $result[$k] = ['status'=>'error','msg'=>$msg];
            }
        }
        return $result;
    }
}

$act = $_GET['aaa'];
$act();
function upa(){
    $image = new upload();
    var_dump($_FILES);
    $images = $image->upload();
}
