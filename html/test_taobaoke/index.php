<?php

header("Content-type: text/html; charset=utf-8");

include "./sdk/TopSdk.php";

//������SDK��ѹ��top���TopClient.php��8��$gatewayUrl��ֵ��Ϊɳ���ַ:http://gw.api.tbsandbox.com/router/rest,

//��ʽ����ʱ��Ҫ���õ�ַ����Ϊ:http://gw.api.taobao.com/router/rest

 

//ʵ����TopClient��

$c = new TopClient;

$c->appkey = "12553629";

$c->secretKey = "sandbox58dd1d4e40c6e45208546181b";

 

//ʵ��������API��Ӧ��Request��

$req = new UserGetRequest;

$req->setFields("nick,sex,uid,created");

$req->setNick("sandbox_c_1");

 

//ִ��API���󲢴�ӡ���

$resp = $c->execute($req);

echo "result:";

print_r($resp);

echo "<br>";

echo "nick:".$req->getNick();

?>