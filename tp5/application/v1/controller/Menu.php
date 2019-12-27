<?php

namespace app\v1\controller;

use think\Controller;
use think\Request;
use app\v1\model\Menu as MenuModel;

class Menu extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $order = input('param.order')?input('param.order'):'price-asc';
        $order= explode('-',$order) ;
        $key = input('param.keywords')?input('param.keywords'):'';
        $offset = input('param.offset');
        $limit = input('param.limit');
        $menu = MenuModel::
            where(function($quest) use($key){
                if($key){
                    $quest-> where('menu_name','like',"%$key%")
                    -> whereOr('key_words','like',"%$key%");
                }
        })
            ->order("$order[0]","$order[1]")
            ->limit($offset,$limit)
            ->select();

        if(count($menu)){
            return ret_json(0,'数据查询成功',200,$menu);
        }else{
            return ret_json(4001,'没有找到数据',404);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *     *   查询菜品详情

     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $detail = MenuModel::find($id);
        if(count($detail)){
            return ret_json(0,'查询成功',200,$detail);
        }else{
            return ret_json(4004,'查询失败',200);
        }
    }

    /**
     * 显示编辑资源表单页.
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
