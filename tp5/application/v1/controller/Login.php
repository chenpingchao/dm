<?php

namespace app\v1\controller;

use app\v1\model\Member;
use think\Controller;
use think\Request;

class Login extends Controller
{
   public function openid(){
        $code = input('param.code');
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx1347ca56752c0a93&secret=12b5643c04c420d8afd090363e43c497&js_code=$code&grant_type=authorization_code";
        $open = file_get_contents($url);
        $open_arr = json_decode($open,true);

        if( $member = Member::where('xcx_openid',$open_arr['openid']) ->find()){
            return ret_json(0,'登录成功',200,$member);
        }else{
            return ret_json(1,'登录失败',200,$open);
        }
   }

    public function getopenid(){
        $code = input('param.code');
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxdefd5c0608bd08bf&secret=a1638c0684079731ea00b0996a0aac78&js_code=$code&grant_type=authorization_code";
        $open = file_get_contents($url);
        $open_arr = json_decode($open,true);

        if( $member = Member::where('xcx_openid',$open_arr['openid']) ->find()){
            return ret_json(0,'登录成功',200,$member);
        }else{
            return ret_json(1,'登录失败',200,$open);
        }
    }

    public function register(){
        $data['username'] = input('param.username');
//        $data['sex'] = input('param.sex');
        $data['avatar'] = input('param.avatar');
        $data['xcx_openid'] = input('param.xcx_openid');
        if( $id = Member::insertGetId($data) ){
            $data['id'] = $id;
            return ret_json(0 , '注册成功',200,$data);
        }else{
            return ret_json(4001 , '注册失败',200);
        }
    }
}
