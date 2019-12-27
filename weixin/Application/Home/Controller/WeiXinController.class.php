<?php
namespace Home\Controller;

use Think\Controller;

class WeiXinController extends Controller
{
    private $token = 'ChenPingChaoDeDingYueHao';
    private $appId = 'wx7b1363f88d80ff3c';  //微信appid
    private $appsecret = '4a2bbcc3f98e059cc255aefd0115af49'; //微信秘钥
    private $robot_key = 'ff6b4669715e420885e5b5b6b9ec1fd1';  //图灵机器人的key
    private $weather = 'c1e474a3e4873db9cfb9f85fe83292fc';  //天气的key
    private $xiaohua = 'e51c1fe865c54fd4ee99ac25d17de25a';  //笑话的key
    private $news = '9cfb8d07cdc0e5b205201fd4a01c1aca';  //新闻的key

    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this -> returns();
    }

    //token验证
    public function yanzheng(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $this -> token;

        $tmpArr = array($token , $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
           echo $_GET['echostr'];
        }
    }

    //被动消息回复
    public function returns(){
        //接受微信服务器发送的文本
        $xml_str = file_get_contents('php://input');
        //将文本转化为对象
        $xml = simplexml_load_string($xml_str);
        switch (strtolower($xml -> MsgType)){
            case 'event':
                //调用事件接受函数
                $this ->receive_event($xml);
                break;
            case 'text':
                //文本消息内容
                $msg = strtolower($xml -> Content);
                $this ->receive_text($xml,$msg);
                break;
            case 'voice':
                //语音消息
                $msg = strtolower($xml -> Recognition);
                $this ->receive_text($xml,$msg);
                break;
        };

    }

    //事件接收函数
    public function receive_event($xml){
        $wx_openid = $xml -> FromUserName;
        switch(strtolower($xml -> Event)){
            //关注
            case 'subscribe':
                if($xml -> Ticket){
                    $comment = '[微笑]欢迎通过扫描关注天白羽的订阅号';
                    $scene_id = explode('_',$xml -> EventKey);
                    $scene_id = "$scene_id[1]";
                }else{
                    $comment = '[微笑]欢迎来的天白羽的订阅号';
                    $scene_id = 'weixing';
                }
                //通过openid的用户信息
                $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this -> get_access_token()."&openid=".$wx_openid."&lang=zh_CN";
                $fans = json_decode($this -> network_request($url),true);
                //写入粉丝表 用户表
                D('Fans') -> addfans($fans,$scene_id);
                D('Member') -> addmember($fans);
                //返回消息

                echo $this -> return_text($xml,$comment);
                break;
            //取消关注
            case 'unsubscribe':
                // 删除粉丝
                D('Fans') -> deletefans("$wx_openid");
                break;
            //点击事件
            case 'click':
                //点击事件函数
                $this -> click_event($xml,strtolower($xml->EventKey));
                break;
            case 'scan':
                $comment = '你已关注过公众号，快去探索新功能吧！';
                echo $this -> return_text($xml,$comment);
                break;

        }
    }

    //文本消息接收函数
    public function receive_text($xml,$msg){
        if($msg == 'help'||$msg == '帮助'){
            $content = "
                1.输入天气+城市名可查询天气
                2.输入搜索+商品名或关键字查询商品
            ";
            echo $this -> return_text($xml,$content);
        }elseif(preg_match('/^搜索/',$msg)){
            //搜索商品
            $search = mb_substr($msg,2);
            //调用商品查询模型
            $rel = D('Menu')->search($search);
            echo $this -> return_text_img($xml,$rel);
        }elseif(preg_match('/天气/',$msg)){
            //天气查询函数
            $content = $this -> weather($msg);
            echo $this -> return_text($xml,$content);
        }else{
            //调用图灵机器人
            $content = $this -> tulin_robot($msg);
            echo $this -> return_text($xml,$content);
        }

    }

    //回复图文消息
    public function return_text_img($xml,$data){
        $str = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <ArticleCount>1</ArticleCount>
            <Articles>
                <item>
                <Title><![CDATA[%s]]></Title>
                    <Description><![CDATA[%s]]></Description>
                    <PicUrl><![CDATA[%s]]></PicUrl>
                    <Url><![CDATA[%s]]></Url>
                </item>
            </Articles>
            </xml>";
        $toUserName = $xml -> FromUserName; //发件人
        $fromUserName = $xml -> ToUserName; //收信人
        $createTime = time();  //时间
        $msgType = 'news';  //类型
        $return_text_img = sprintf($str,$toUserName,$fromUserName,$createTime,$msgType,$data['title'],$data['description'],$data['picurl'],$data['url']);

        return $return_text_img;
    }

    //回复文本消息
    public function return_text($xml,$content){
        $str = '<xml>
                  <ToUserName><![CDATA[%s]]></ToUserName>
                  <FromUserName><![CDATA[%s]]></FromUserName>
                  <CreateTime>%s</CreateTime>
                  <MsgType><![CDATA[%s]]></MsgType>
                  <Content><![CDATA[%s]]></Content>
                </xml>';
        $toUserName = $xml -> FromUserName;
        $fromUserName = $xml -> ToUserName;
        $createTime = time();
        $msgType = 'text';
        $return_text= sprintf($str,$toUserName,$fromUserName,$createTime,$msgType,$content);

        return $return_text;
    }

    //获取Access_token
    public function get_access_token(){
        $memcache=new \Memcache;
        $memcache->connect('127.0.0.1','11211');
        if(!$access_token = $memcache -> get('access_token')){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appsecret;
            $reltoken = $this -> network_request($url);

            $content = json_decode($reltoken,true);
            $memcache->set("access_token",$content['access_token'],false,$content['expires_in']);
            $access_token = $content['access_token'];
        }
        $memcache->close();
        return $access_token;
    }

    //万能的模拟请求
    public function network_request($url,$type='get',$data=''){
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

    //图灵机器人
    public function tulin_robot($msg){
        //图灵机器人的接口
        $url = 'http://www.tuling123.com/openapi/api?key='.$this->robot_key.'&info='.urlencode($msg);
        $rel = json_decode($this -> network_request($url),true);
        if($rel['code'] == 100000){
            $content = $rel['text'];
        }else{
            $content = '机器人宕机了';
        }
        return $content;
    }

    //天气查询函数
    public function weather($msg){
        $city = preg_replace('/天气/','',$msg);
        $url = "http://v.juhe.cn/weather/index?format=2&cityname=".urlencode($city)."&key=".$this -> weather;
        $rel =  json_decode($this -> network_request($url),true);
        //判断天气是否查询成功
        if($rel['resultcode']==200){
            $content = "
日期：{$rel['result']['today']['date_y']}\n
城市：{$rel['result']['today']['city']}\n
天气：{$rel['result']['today']['weather']}\n
气温：{$rel['result']['today']['temperature']}\n
风力：{$rel['result']['today']['wind']}\n
星期：{$rel['result']['today']['week']}\n
出行建议：{$rel['result']['today']['dressing_advice']}\n
                ";
        }else{
            $content = '该地区暂不支持查询';
        }
        return $content;
    }

    //点击事件函数
    public function click_event($xml,$msg){
        switch ($msg){
            case 'xiaohua':
                $url = "http://v.juhe.cn/joke/randJoke.php?key=".$this->xiaohua;
                $rel = json_decode($this->network_request($url),true);
                if($rel['reason'] == 'success'){
                    $num = mt_rand(0,9);
                    $content = $rel['result'][$num]['content'];
                }else{
                    $content = '暂时没有笑话，继续探寻其他功能吧';
                }
                echo $this -> return_text($xml,$content);
                break;
            case 'news':
                //随机新闻类型
                $num = mt_rand(0,9);
                $type = ['top','shehui','guonei','guoji','yule','tiyujunshi','keji','caijing','shishan'];
                $url = "http://v.juhe.cn/toutiao/index?type=".$type[$num]."&key=".$this->news;
                $rel = json_decode($this->network_request($url),true);
                if($rel['error_code'] == 0){
                    //随机新闻
                    $num = mt_rand(0,30);
                    $news = $rel['result']['data'][$num];
                    $content['title'] = $news['title'];
                    $content['description'] = $news['author_name'];
                    $content['picurl'] = $news['thumbnail_pic_s'];
                    $content['url'] = $news['url'];
                    echo $this ->return_text_img($xml,$content);
                }else{
                    $content = '暂时没有新闻';
                    echo $this -> return_text($xml,$content);
                }
                break;
        }
    }

    //创建公众号菜单
    public function creat_menus(){
        //创建公众号菜单接口
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this ->get_access_token();
        //创建公众号菜单
        $data = '{
            "button":[
            {	
                  "type":"view",
                  "name":"外卖商城",
                  "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this -> appId.'&redirect_uri='.urlencode("http://m.chpch.top").'&response_type=code&scope=snsapi_base&state=123#wechat_redirect"
            },
            {
                 "name":"菜单",
                 "sub_button":[
                 {	
                       "type":"click",
                       "name":"笑话",
                       "key":"XIAOHUA"
                    },
                    {
                       "type":"click",
                       "name":"新闻头条",
                       "key":"NEWS"
                    }]
            },
            {	
                  "type":"view",
                  "name":"pc商城",
                  "url":"http://www.liuweiliming.cn"
            }
            
        ]}';
        $rel = json_decode($this -> network_request($url,'post',$data),true);
        if($rel['errcode'] == 0){
            echo '菜单创建成功';
        }
    }

    //删除公众号菜单
    public function delete_menus(){
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$this ->get_access_token();
        $rel = json_decode($this -> network_request($url),true);
        if($rel['errcode'] == 0 ){
            echo '菜单删除成功';
        }
    }

    //群发消息
    public function send_all($content){
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this ->get_access_token();
        $openid = D('Fans') -> getAll();
        $data = json_decode('
        {
            "touser":"",
            "msgtype":"text",
            "text": { "content": "'.$content.'"}
        }',true);
        $data['touser'] = $openid;
        $data = json_encode($data);
        //请求
        return $this -> network_request($url,'post',$data);

    }

    //向单个用户发送消息
    public function send_one($content,$openid){
        $url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$this -> get_access_token();
        $data = '{
                    "touser":"'.$openid.'",
                    "msgtype":"text",
                    "text":
                    {
                         "content":"'.$content.'"
                    }
                }';
        return $this -> network_request($url,'post',$data);
    }

    //不通过数据库获取粉丝的openid
    public function get_openid_from_wx(){
        $url ='https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this ->get_access_token().'&next_openid=';
        $rel = json_decode($this -> network_request($url),true);
        return $rel['data']['openid'];
    }

    //生成二位码
    public function get_qrcode($expire_seconds,$scene_id){
        $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this -> get_access_token();
        $data = <<<XXX
            {"expire_seconds": "$expire_seconds",
             "action_name": "QR_SCENE",
             "action_info": {"scene": {"scene_id": "$scene_id"}}}
XXX;
        return $this -> network_request($url,'post',$data);

    }
}