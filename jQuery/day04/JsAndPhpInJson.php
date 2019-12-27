<?php
$json = '{"username":"zs","age":"18"}';
print_r(json_decode($json));
echo "<br>";
print_r(json_encode(["username"=>"dss","age"=>18]))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
<script>
    var rel = {username:"zd",age:"18",height:"170"};
    console.log(rel);
    // var rels = JSON.parse(rel);
    // console.log(rels)
</script>
</html>