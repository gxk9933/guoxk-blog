<?php

header("Content-type: text/html; charset=utf-8");

include "./sdk/TopSdk.php";

//将下载SDK解压后top里的TopClient.php第8行$gatewayUrl的值改为沙箱地址:http://gw.api.tbsandbox.com/router/rest,

//正式环境时需要将该地址设置为:http://gw.api.taobao.com/router/rest

 

//实例化TopClient类

$c = new TopClient;

$c->appkey = "12553629";

$c->secretKey = "sandbox58dd1d4e40c6e45208546181b";

 

//实例化具体API对应的Request类

$req = new UserGetRequest;

$req->setFields("nick,sex,uid,created");

$req->setNick("sandbox_c_1");

 

//执行API请求并打印结果

$resp = $c->execute($req);

echo "result:";

print_r($resp);

echo "<br>";

echo "nick:".$req->getNick();

?>