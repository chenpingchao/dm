<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/Index/hello');
Route::get('index','admin/Test/index');
Route::get('test1','admin/Test/test');

//资源路由
Route::resource('menu','v1/Menu');
//加入购物车
Route::get('addcart','v1/Cart/addCart');
//查询购物车商品数
Route::get('cart_num','v1/Cart/index');
//获取购物车商品
Route::get('getCart','v1/Cart/getCart');
//登录
Route::get('openid','v1/Login/openid');
Route::post('register','v1/Login/register');
Route::get('getopenid','v1/Login/getopenid');

//购物车商品加
Route::get('buynumadd','v1/Cart/buynum_add');
Route::get('buynumMinus','v1/Cart/buynum_minus');
Route::get('active','v1/Cart/active');
Route::get('allactive','v1/Cart/allactive');