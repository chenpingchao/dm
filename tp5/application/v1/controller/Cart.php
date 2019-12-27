<?php

namespace app\v1\controller;


use app\v1\model\Menu;
use think\Controller;
use think\Request;
use app\v1\model\Cart as CartModel;

class Cart extends Controller
{
    /**
     * 统计购物车数量
     */
    public function index()
    {
        $mid = input('param.mid');
        if($num = CartModel::where('mid',$mid) -> sum('buynum') ){
            $data['num'] = $num;
            return ret_json(0,'数量查询成功',200,$data);
        }else{
            return ret_json(4001,'数量查询失败',200);
        }
    }
    /**
     * 添加购物车
     */
    public function addCart(){
        $data['mid'] = input('param.mid');
        $data['uid'] = input('param.uid');
        $res = CartModel::where('mid',$data['mid'])->where('uid',$data['uid'])-> find();
        if(count($res)){
         //购物车中有该商品
            if(CartModel::where('mid',$data['mid'])->where('uid',$data['uid'])->setInc('buynum') ){
                return ret_json(0,'数量增加成功',200);
            }else{
                return ret_json(4001,'数量增加失败',200);
            }
        }else{
            //购物车中没有该商品
            $data['buynum'] = 1;
            $data['add_time'] = time();
            if(CartModel::insert($data)){
                return ret_json(0,'商品添加成功',200);
            }else{
                return ret_json(4001,'商品添加失败',200);
            }
        }
    }
    /**
     * 查询购物车所有商屏
     */
    public function getCart(){
        $mid = input('param.mid');
        $cart = CartModel:: alias('c')
            ->join('one_menu u','c.uid = u.id','left')
            ->where('mid',$mid)
            ->field('c.*,image_dir,image,menu_name,price,or_price')
            -> select();
        if(count($cart)){
            return ret_json(0,'购物车查询成功',200,$cart);
        }else{
            return ret_json(4001,'购物车查询失败',200);
        }
    }
    /**
     * 购物车商品数量加
     */
    public function buynum_add(){
        $cid = input('param.cid');
        if(CartModel::where('id',$cid)->setInc('buynum') ){
            return ret_json(0,'数量增加成功',200);
        }else{
            return ret_json(4001,'数量增加失败',200);
        }
    }
    /**
     * 购物车商品数量减
     */
    public function buynum_minus(){
        $cid = input('param.cid');
        if(CartModel::where('id',$cid)->setDec('buynum') ){
            return ret_json(0,'数量增加成功',200);
        }else{
            return ret_json(4001,'数量增加失败',200);
        }
    }
    /**
     * 购物车单个商品状态
     */
    public function active(){
        $cid = input('param.cid');
        $active = input('param.active');
        if(CartModel::where('id',$cid )->data(['active'=> $active]) ->update() ){
            return ret_json(0,'状态成功',200);
        }else{
            return ret_json(4001,'状态失败',200);
        }
    }

    /**
     * 购物车所有商品状态
     */
    public function allactive(){
        $mid = input('param.mid');
        $active = input('param.active');
        if(CartModel::where('mid',$mid )->data(['active'=> $active]) ->update() ){
            return ret_json(0,'状态成功',200);
        }else{
            return ret_json(4001,'状态失败',200);
        }
    }
}
