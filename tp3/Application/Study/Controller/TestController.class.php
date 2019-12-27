<?php
namespace Study\Controller;
use Think\Controller;

class TestController extends Controller{
    public function test(){
        dd(I('get.id'));
        dd(IS_GET);
        dd(C('db_name'));
        dd(U('study/index/index',['id'=>3,'username'=>'苍天']));
        $admin = M('Admin')->select();
        $this -> assign('name','请叫我黑心商人');
        $this -> assign('detail','地沟油做菜不解释');
        $this -> assign('num',1);
        $this -> assign('admin',$admin);
        $this -> assign('stall',['1号'=>'fpxnb','二号'=>'祛湿','三号'=>'php','4号'=>'是世界上最好的语言']);
        $this -> display('Test2/test');
//            for($i =1 ; $i<=10; $i++){
//                dd(M('Admin') -> add(['username'=>$i.'hjfsagh','password'=> md5(1231),'add_time'=> time()]));
//            }
        /*dd(
//        M('Admin') -> where('id>10') -> delete();
//        M('Admin')->where('id=10')->data(array('password'=>12323)) ->save();
//        M('Admin')-> where('id=1') -> save(array('password'=>1123123))
        //查询
        M('Admin')-> where('id=1')->find()
//        M('Admin')-> where('id=1')->select()
        M('Admin')->field('username,password,add_time')
            ->where('id>5')
            ->order('add_time desc')
            ->limit(3,5)
            ->select()

        );*/
        $where['id'] = array('gt',3);
        $where['login_num'] = array('lt',4000);
        $map['_logic'] = 'or';
        $map['_complex'] = $where;
        $map['active']=array('eq',2);
        //多条件查询
//        dd(
//        M('Admin') -> field('username,password,add_time') -> where($map) -> select();
        //多表连接查询
     /*   M('Goods')->alias('g')
            ->join('category as c on g.cid=c.id')
            ->field('goodsname,catename,price')
            ->where('g.active=1')
            ->select()*/
//        );

//        dd(M('Admin') -> delete(18));
    }
    public function test1(){
//        $this -> error('跳转失败',U( 'Study/Test/test'),3);
//        $this -> success('成功跳转',U( 'Study/Test/test'),3);
//        redirect(U( 'Study/Test/test'), 5, '页面跳转中...');
//        $this -> display('Test/test1');
    }

}
