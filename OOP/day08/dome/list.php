<?php

require_once "conf.inc.php";
//查询已登录的人数
$time = time() - ini_get('session.gc_maxlifetime');
$member = $pdo -> query("select count(sid) from session where mtime > $time and mid>0");
$member = $member -> fetch(PDO::FETCH_ASSOC);

echo "<br>";
//查询在线人数
$member2 = $pdo -> query("select count(sid) from session where mtime>$time");
$member2 = $member2 -> fetch(PDO::FETCH_ASSOC);
//查询已登录人员的名单
$result = $pdo -> query("select username from session s,member m where s.mid=m.id and mtime>$time and mid>0 ");
$member3 = $result -> fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <dl>
        <dd>登录人数:<?php echo $member['count(sid)']?></dd>
        <dd>在线人数:<?php echo $member2['count(sid)']?></dd>
        <dd>已登录人员：
        <?php
        foreach($member3 as $v){
            echo $v['username'];
        }
        ?>
        </dd>
    </dl>
</body>
</html>
