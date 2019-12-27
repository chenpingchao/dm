<?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 16:07:54
         compiled from "D:/xxzl/dm/smarty/day02/templates\goods\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:147055d89c2ac9a2710-59051831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e06291d8bb27b99ca0135754f193a43f9503379c' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\goods\\detail.html',
      1 => 1569312474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147055d89c2ac9a2710-59051831',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d89c2ac9d1519_74455733',
  'variables' => 
  array (
    'detail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d89c2ac9d1519_74455733')) {function content_5d89c2ac9d1519_74455733($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<dl>
    <dt>商品详情</dt>
    <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['goodsname'];?>
</dd>
    <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['price'];?>
</dd>
    <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['store_num'];?>
</dd>
    <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['add_time'];?>
</dd>
</dl>

</body>
</html><?php }} ?>