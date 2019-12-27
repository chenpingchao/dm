<?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 13:26:01
         compiled from "D:/xxzl/dm/smarty/day02/templates\extend\son.html" */ ?>
<?php /*%%SmartyHeaderCode:152135d8994cb2038e5-88266572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6f5736cecc4f187db9700cf80632139c4077ed4' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\extend\\son.html',
      1 => 1569302741,
      2 => 'file',
    ),
    '74f465a72f3e586f22819a23ba217c26284cd687' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\extend\\parent.html',
      1 => 1569302741,
      2 => 'file',
    ),
    'a7d4000259802e6c05f094b2029a5d7b13d8cd41' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day02/templates\\extend\\public\\footer.html',
      1 => 1569295863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152135d8994cb2038e5-88266572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d8994cb23e262_90182085',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8994cb23e262_90182085')) {function content_5d8994cb23e262_90182085($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("extend/public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



    已经完成重写

<br>

<p>要在后边追加内容</p>

后边完成追加

<br>

前边完成追加

<p>要在前边追加内容</p>

<br>



    <p>123
父的中间追加
321</p>

<br>


  <p>子的中间追加
123321
加追间中的子</p>

<?php /*  Call merged included template "extend/public/footer.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("extend/public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '152135d8994cb2038e5-88266572');
content_5d89a8e9691cb8_44495281($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "extend/public/footer.html" */?>


</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2019-09-24 13:26:01
         compiled from "D:/xxzl/dm/smarty/day02/templates\extend\public\footer.html" */ ?>
<?php if ($_valid && !is_callable('content_5d89a8e9691cb8_44495281')) {function content_5d89a8e9691cb8_44495281($_smarty_tpl) {?><h2>这是一个尾部</h2><?php }} ?>