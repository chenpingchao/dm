<?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 12:08:32
         compiled from "D:/xxzl/dm/smarty/day02/templates\extend\parent.html" */ ?>
<?php /*%%SmartyHeaderCode:50275d8992b2b65d30-22611177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74f465a72f3e586f22819a23ba217c26284cd687' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\extend\\parent.html',
      1 => 1569298112,
      2 => 'file',
    ),
    'a7d4000259802e6c05f094b2029a5d7b13d8cd41' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\extend\\public\\footer.html',
      1 => 1569295863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50275d8992b2b65d30-22611177',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8992b2b90cc8_63475584',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8992b2b90cc8_63475584')) {function content_5d8992b2b90cc8_63475584($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("extend/public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>

<?php /*  Call merged included template "extend/public/footer.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("extend/public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '50275d8992b2b65d30-22611177');
content_5d8996c0d6fe69_93205600($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "extend/public/footer.html" */?>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 12:08:32
         compiled from "D:/xxzl/dm/smarty/day02/templates\extend\public\footer.html" */ ?>
<?php if ($_valid && !is_callable('content_5d8996c0d6fe69_93205600')) {function content_5d8996c0d6fe69_93205600($_smarty_tpl) {?><h2>这是一个尾部</h2><?php }} ?>