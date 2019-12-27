<?php
namespace Home\Model;

use Think\Model;

class MenuModel extends Model {
    public function search($search){
        $where['_logic'] = 'OR';
        $where['menu_name'] = ['like',"%$search%"];
        $where['key_words'] = ['like',"%$search%"];

        $rel = $this -> field('id,menu_name,image_dir,image') -> where($where)->limit(5) -> select();
        //微信一次返回一条
        $num = mt_rand(0,4);
        $menu = $rel[$num];

        $data['title'] = mb_substr($menu['menu_name'],0,10);
        $data['description'] = mb_substr($menu['detail'],0,30);
        //http://www.andygao.top/upload/2018-05/800_20180516150239-5afbd78f2c4c5.jpg
        $data['picurl'] = C('SITE_URL').$menu['image_dir'].'350_'.$menu['image'];
        //http://www.andygao.top/goods/detail/15
        $data['url'] = C('SITE_URL').'Home/Index/menuDetail/uid/'.$menu['id'];

        return $data;
    }
}