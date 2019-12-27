<?php
/*require_once "session.sql.class.php";

/*Session::start();

$_SESSION["name"] = "username";
//echo $_SESSION['name'];
try{
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=yhshop","root","root",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
    ]);
}catch(PDOException $e){
    $e -> getMessage();
}
Session::start($pdo);

$act = $_GET['act'];
$act();

function login(){
    global $pdo;
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    if(!empty($username)){
        if(!empty($password)){
            $stmt = $pdo-> prepare("select id,username from member where username=? and password=? limit 1");
            if($stmt -> execute([$username,$password])){
//                var_dump("select id,username from member where username='$username' and password='$password' limit 1");
//                var_dump($stmt -> fetch(PDO::FETCH_ASSOC));
//                var_dump($password);
                if($member = $stmt -> fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['mname'] = $member['username'];
                    $_SESSION['mid'] = $member['id'];
                    echo "正确";
                }else{
                    echo "错误";
                }
            }else{
                echo "11错误";
            }

          }
    }
}*/
echo "<pre>";
$url = "http://v.juhe.cn/weather/index?format=2&cityname=信阳&key=c1e474a3e4873db9cfb9f85fe83292fc";
print_r(json_decode(network_request($url),true));
function network_request($url,$type='get',$data=''){
    //1.初始化curl
    $curl = curl_init();
    //2.配置curl
    //配置要访问的url地址
    curl_setopt($curl,CURLOPT_URL,$url);
    //配置将请求结果以文档流的方式返回，而不是在页面上直接显示
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

    //判断是否为post请求
    if($type == 'post'){
        //设置请求访问为post
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    }

    //关闭SSL验证
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);


    //3.发送请求,获取请求结果
    $res = curl_exec($curl);

    //4.关闭curl
    curl_close($curl);

    return $res;
}