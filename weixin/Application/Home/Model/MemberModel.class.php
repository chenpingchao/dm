<?php
namespace Home\Model;

use Think\Model;
class MemberModel extends Model{
    //写入用户表
    public function addmember($fans){
        $data['openid'] = $fans['openid'];
        $data['username'] = $fans['nickname'];
        $data['sex'] = $fans['sex']==1?'男':'女';
        $data['avatar'] = $fans['headimgurl'];
        $data['add_time'] = time();
        $data['site'] = $fans['country'].$fans['province'].$fans['city'];
        $this -> add($data);
    }
}