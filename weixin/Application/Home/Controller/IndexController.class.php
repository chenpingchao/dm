<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $openidAll = A('WeiXin') -> get_openid_from_wx();
        $this -> assign('openid',$openidAll);
        $qrcode = M('Qrcode')->select();
        $this -> assign('qrcode',$qrcode);
        $this -> display('');
    }
    //群发消息
    public function sendAll(){
        if(IS_POST){
            $rel = A('WeiXin') -> send_all(I('post.content'));
            $rel = json_decode($rel,true);
            if($rel['errcode'] ==0){
                $this -> success('ok');
            }else{
                $this -> error('error');
            }

        }else{
            $this ->display();
        }

    }

    //单个发消息
    public function sendOne(){
        if(IS_POST){
            $rel = A('WeiXin') -> send_one(I('post.content'),'oRfzrsvXaosX-OhEEQ2xtq5_oAwM');
            $rel = json_decode($rel,true);
            if($rel['errcode'] ==0){
                $this -> success('ok');
            }else{
                $this -> error('error');
            }
        }else{
            $openid = I('get.openid');
            $this -> assign('openid',$openid);
            $this ->display();
        }

    }

    //生成二维码
    public function qrcode(){
        if(IS_POST){
            $rel = A('WeiXin') -> get_qrcode(I('post.expire_seconds'),I('post.scene_id'));
            $rel = json_decode($rel,true);
            $data['scene_id'] = I('post.scene_id');
            $data['expire_seconds'] = time() + $rel['expire_seconds'];
            $data['qrcode_url'] = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$rel['ticket'];
            $data['ticket'] = $rel['ticket'];
            $data['name'] = I("post.name");
            if(M('Qrcode')-> add($data)){
                $this -> success('ok');
            }else{
                $this -> error('error');
            }

        }else{
            $this ->display();
        }

    }

}