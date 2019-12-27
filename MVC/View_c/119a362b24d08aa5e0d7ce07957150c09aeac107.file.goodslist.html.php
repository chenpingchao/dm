<?php /* Smarty version Smarty-3.1.8, created on 2019-09-25 15:14:11
         compiled from "D:/xxzl/dm/MVC/View\goodslist.html" */ ?>
<?php /*%%SmartyHeaderCode:35235d8b10e592df14-18296585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '119a362b24d08aa5e0d7ce07957150c09aeac107' => 
    array (
      0 => 'D:/xxzl/dm/MVC/View\\goodslist.html',
      1 => 1569395649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35235d8b10e592df14-18296585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8b10e595cd20_56819758',
  'variables' => 
  array (
    'goods' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b10e595cd20_56819758')) {function content_5d8b10e595cd20_56819758($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <dl>
        <dt>商品列表</dt>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
        <dd>
            <span><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
</span>
            <span><a href="/MVC/index.php?c=goods&a=goodsDetail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['goodsname'];?>
</a></span>
            <span><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</span>
            <span><?php echo $_smarty_tpl->tpl_vars['v']->value['store_num'];?>
</span>
        </dd>
        <?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>

        <?php } ?>
    </dl>
</body>
</html><?php }} ?>