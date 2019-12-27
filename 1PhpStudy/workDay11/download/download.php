<?php
@$filename = $_GET['filename'];
header("Congtent_Disposition:attachment;filename=".basename($filename));
header("Content-Length:".filesize($filename));
@readfile($filename);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>下载文档</title>
</head>
<body>
<a href="?filename=11.txt">下载文档</a>
</body>
</html>