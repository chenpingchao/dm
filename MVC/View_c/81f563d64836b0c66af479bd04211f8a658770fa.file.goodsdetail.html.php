<?php /* Smarty version Smarty-3.1.8, created on 2019-09-25 15:18:00
         compiled from "D:/xxzl/dm/MVC/View\goodsdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:13675d8b13c56c0df3-44014308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f563d64836b0c66af479bd04211f8a658770fa' => 
    array (
      0 => 'D:/xxzl/dm/MVC/View\\goodsdetail.html',
      1 => 1569395817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13675d8b13c56c0df3-44014308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8b13c56ebd72_19621407',
  'variables' => 
  array (
    'detail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b13c56ebd72_19621407')) {function content_5d8b13c56ebd72_19621407($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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