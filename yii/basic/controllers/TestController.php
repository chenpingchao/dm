<?php

namespace app\controllers;

use app\Models\Goods;
use Yii;
class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*$request =  Yii::$app->request;
        $a = $request -> get();
        return $this->render('index',['a'=> $a ]);*/
        echo 'aaa';
    }
    public function actionIndex2(){
       /* echo Yii::$app->urlManager->createAbsoluteUrl( ['index1/100',] );
        echo "<br>";
        echo 'index2';
        echo "<br>";
        dd('aaaa');*/
//       查询
        //方法一： 原生sql
        $sql = 'select * from goods where active=:active';
        $res = Goods::findBySql($sql,['active'=> 1]) ->asArray()->one();
        $res = Goods::findBySql($sql,['active'=> 1]) ->asArray()->all();

        //方法二
        $res = Goods::findOne('1');
        $res = Goods::findAll([1,2,3]);

        //方法三
        $res = Goods::find() -> asArray() -> one();
        $res = Goods::find() -> asArray() -> all();
        $res = Goods::find() -> count('id');
        $res = Goods::find() -> average('price');
        $res = Goods::find() -> min('price');
        $res = Goods::find() -> max('price');

        //终极方案
        $res = Goods::find()
            ->select(['id','goodsname','price'])
            ->where(['>','price',5])
            ->andWhere(['between','id',2,100])
            ->orWhere(['active'=>2])
            ->orderBy('price desc')
            ->asArray();
        //echo $res -> createCommand() ->getRawSql();

        //多表联合查询
        $res = Goods::find()
            ->alias('g')
            ->innerJoin('{{category}} c','g.cid = c.id')
            ->select(['goodsname','catename'])
            ->asArray();
/*        echo $res -> createCommand() ->getRawSql();
        dd($res -> all());*/

        //插入
        /*$goods = new Goods();
        $goods -> goodsname = '战神笔记本';
        $goods -> cid  = '4';
        $goods -> price = 40000.00;
        $goods -> market_price = 39999.00;
        $goods -> save();
        echo $goods -> id;*/

        //修改
        //方法1
        /*$goods = Goods::findOne(36);
        $goods -> goodsname = '华硕本';
        dd($goods -> save());*/
        //方法2
//        dd(Goods::updateAll(['goodsname'=>'小米本'],'id=:id',['id'=>36 ]));
        //自增 自减
       /* for($i=1 ;$i<100;$i++){
            dd(Goods::updateAllCounters(['price'=>'-123'],['id'=> 36]));
        }*/
        //删除
        /*$goods = Goods::findOne(36);
        dd($goods -> delete());*/

        dd(Goods::deleteAll('price > :price', ['price'=>5] ));


    }
    public function actionLogin(){

    }
    public function actionSession(){
        $session = Yii::$app-> session;

        //写入session中
        $session['nbname'] = 'php';
        $session -> set('nxname', 'java');

        //删除session中的数据
        $session -> remove('nbname');
        unset($session['nxname']);

        //取出session中的数据
        echo $session['nbname'];
        echo $session -> get('nxname');

        //判断session中是否存在
        dd($session->has('nbname'));
        dd(isset($session['nxname']));
    }
    public function actionCookie(){
        $cookie1 = Yii::$app-> response -> cookies;
        $cookie1 -> add(new Cookie([
            'name' => '甜品',
            'value' => '冰糖',
            'expire' => time() +20
        ]));

        echo $cookie1['甜品'];

    }

//    public function action


}
