<?php /* Smarty version Smarty-3.1.8, created on 2019-09-27 20:25:53
         compiled from "D:/xxzl/dm/zjfuxi/MVC/View\goodsdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:191565d8dffd1269ac3-26367817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb9859785c5777c74c29bd773479e9dd82bd9d93' => 
    array (
      0 => 'D:/xxzl/dm/zjfuxi/MVC/View\\goodsdetail.html',
      1 => 1569587043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191565d8dffd1269ac3-26367817',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'detail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8dffd1290bc6_45101244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8dffd1290bc6_45101244')) {function content_5d8dffd1290bc6_45101244($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title11</title>
</head>
<body>
    <dl>
        <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['goodsname'];?>
</dd>
        <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['price'];?>
</dd>
        <dd><?php echo $_smarty_tpl->tpl_vars['detail']->value['store_num'];?>
</dd>
    </dl>
</body>
</html><?php }} ?>