<?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 16:17:21
         compiled from "D:/xxzl/dm/smarty/day02/templates\goods\goodsList.html" */ ?>
<?php /*%%SmartyHeaderCode:238675d89bbe9ce3ba7-20176539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '959e18ce6fb5ce30b80fdae254fd27235cdbfcc3' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\goods\\goodsList.html',
      1 => 1569312848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238675d89bbe9ce3ba7-20176539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d89bbe9d16836_20936632',
  'variables' => 
  array (
    'goods' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d89bbe9d16836_20936632')) {function content_5d89bbe9d16836_20936632($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<dl>
    <dt>商品列表</dt>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
    <dd>
        <span><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
</span>
        <span><a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['goodsname'];?>
</a></span>
        <span><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</span>
        <span><?php echo $_smarty_tpl->tpl_vars['v']->value['store_num'];?>
</span>
        <span><a href="change.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a></span>
    </dd>
    <?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
    <dd><h2>暂无该类商品</h2></dd>
    <?php } ?>
</dl>

</body>
</html><?php }} ?>