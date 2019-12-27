<?php /* Smarty version Smarty-3.1.8, created on 2019-09-23 17:23:32
         compiled from "D:/xxzl/dm/smarty/day1/demo1/templates\test2.html" */ ?>
<?php /*%%SmartyHeaderCode:20225d8885ad21e188-46363450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f3e154aa165130d67a741d2d4821cf056deb3ac' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day1/demo1/templates\\test2.html',
      1 => 1569230611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20225d8885ad21e188-46363450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8885ad24cf92_80329337',
  'variables' => 
  array (
    'username' => 0,
    'age' => 0,
    'msg' => 0,
    'num' => 0,
    'i' => 0,
    'arr' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8885ad24cf92_80329337')) {function content_5d8885ad24cf92_80329337($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--<p><?php echo $_GET['username'];?>
</p>
<p><?php echo $_POST['msg'];?>
</p>
<p><?php echo $_COOKIE['age'];?>
</p>
<p><?php echo $_SESSION['say'];?>
</p>
<p><?php echo time();?>
</p>
<p><?php echo @ROOT;?>
</p>
<p><?php echo 'Smarty-3.1.8';?>
</p>
<p><?php echo date('Y-m-d',time());?>
</p>-->

<!--声明变量
<?php $_smarty_tpl->tpl_vars['username'] = new Smarty_variable('Rose', null, 0);?>
<?php $_smarty_tpl->tpl_vars["age"] = new Smarty_variable("19", null, 0);?>
<?php $_smarty_tpl->tpl_vars['msg'] = new Smarty_variable("女装大佬", null, 0);?>
<p><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['age']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>-->

<!--
<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_variable(4, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['num']->value>5){?>
<p>一等奖</p>
<?php }elseif($_smarty_tpl->tpl_vars['num']->value>3){?>
<p>二等奖</p>
<?php }elseif($_smarty_tpl->tpl_vars['num']->value>1){?>
<p>三等奖</p>
<?php }else{ ?>
<p>安慰奖</p>
<?php }?>-->

<!--
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 7;$_smarty_tpl->tpl_vars['i']->total = (int)min(ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 100+1 - (1) : 1-(100)+1)/abs($_smarty_tpl->tpl_vars['i']->step)),11);
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
<span><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</span>
<?php }} else { ?>
<p>错误</p>
<?php }  ?>-->

<!--
<p>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php while ($_smarty_tpl->tpl_vars['i']->value<10){?>
        <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

    <?php }?>
</p>-->


<table width="800">
    <tr>
        <th>标题</th>
        <th>名称</th>
        <th>价格</th>
        <th>数量</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['v']->value['goodsname'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['v']->value['store_num'];?>
</th>
    </tr>
    <?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
    <tr>
        <th colspan="4">暂无商品</th>
    </tr>
    <?php } ?>
</table>
</body>

</html><?php }} ?>