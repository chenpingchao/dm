<?php /* Smarty version Smarty-3.1.8, created on 2019-09-23 16:31:01
         compiled from "D:/xxzl/dm/smarty/day1/demo1/templates\test1.html" */ ?>
<?php /*%%SmartyHeaderCode:36375d887def5d0b68-66969026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c7797151a716ca776e3986ac1b57cba4d638fa1' => 
    array (
      0 => 'D:/xxzl/dm/smarty/day1/demo1/templates\\test1.html',
      1 => 1569227460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36375d887def5d0b68-66969026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5d887def5f3df1_15702141',
  'variables' => 
  array (
    'p1' => 0,
    'p2' => 0,
    'p3' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d887def5f3df1_15702141')) {function content_5d887def5f3df1_15702141($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--
()

<p>(<?php echo $_smarty_tpl->tpl_vars['p1']->value;?>
)</p>
<p>(<?php echo $_smarty_tpl->tpl_vars['p2']->value;?>
)</p>
<p>(<?php echo $_smarty_tpl->tpl_vars['p3']->value;?>
)</p>
-->



<p>
    
        {$p1}
    
</p>


<p>
    {$p2}
</p>


<p>
    <?php echo '{';?>
$p3<?php echo '}';?>

</p>
</body>
</html><?php }} ?>