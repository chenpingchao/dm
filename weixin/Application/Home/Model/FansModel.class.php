<?php
namespace Home\Model;

use Think\Model;

class FansModel extends Model{
    //将关注的用户写入粉丝表
    public function addfans($fans,$scene_id){
        $data['wx_openid'] = $fans['openid'];
        $data['nickname'] = $fans['nickname'];
        $data['sex'] = $fans['sex']==1?'男':'女';
        $data['avatar'] = $fans['headimgurl'];
        $data['add_time'] = time();
        $data['scene_id'] = $scene_id;
        $data['site'] = $fans['country'].$fans['province'].$fans['city'];
        $this -> add($data);
    }
    //删除粉丝
    public function deletefans($wx_openid){
       $this -> where(['wx_openid'=>$wx_openid]) -> delete();
    }

    //获取所有粉丝的openID
    public function getAll(){
        $rel = $this -> field('wx_openid') -> select();
        foreach ($rel as $v){
            $content[] = "{$v['wx_openid']}";
        }
        return $content;
    }
}