<?php

//$phone = ;
//echo 123;


session_start();
$code = rand(1000,9999);
$_SESSION['code'] = $code;

//echo $_SESSION['code'];

//use \think\Session;

//\think\Session::set('code',$code);

//echo $code;


require_once './../extend/SDK/CCPRestSDK.php';

 $accountSid = '8aaf070857514dd701579ec122d81e32'; 
 //说明：主账号，登陆云通讯网站后，可在控制台首页看到开发者主账号ACCOUNT SID。

 $accountToken = '7dd755b3c5df4c9ab1d40763e58f513e'; 
 //说明：主账号Token，登陆云通讯网站后，可在控制台首页看到开发者主账号AUTH TOKEN。

 $appId = '8aaf07085cb01a51015cc442294804c9'; 
 //说明：请使用管理控制台中已创建应用的APPID。

 $serverIP = 'sandboxapp.cloopen.com'; 
 //说明：生成环境请求地址：app.cloopen.com。

 $serverPort = '8883'; 
 //说明：请求端口 ，无论生产环境还是沙盒环境都为8883.

$softVersion='2013-12-26'; 
 //说明：REST API版本号保持不变。


 function sendTemplateSMS($to,$datas,$tempId)

 {
     // 初始化REST SDK
     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion; 
     $rest = new REST($serverIP,$serverPort,$softVersion); 
     $rest->setAccount($accountSid,$accountToken); 
     $rest->setAppId($appId); 
    

     // 发送模板短信
     //echo "Sending TemplateSMS to $to ";
     $result = $rest->sendTemplateSMS($to,$datas,$tempId); 
     if($result == NULL ) {
         //echo "result error!"; 
         //return 'result error';
         //break;
         return false; 
     }
     if($result->statusCode!=0) {
         //echo "模板短信发送失败!";
         //echo "error code :" . $result->statusCode . " 1 ";
         //echo "error msg :" . $result->statusMsg . " 2 ";
         //下面可以自己添加错误处理逻辑
     	return false;
     }else{
         //echo "模板短信发送成功! ";
         // 获取返回信息
         //$smsmessage = $result->TemplateSMS; 
         //echo "dateCreated:".$smsmessage->dateCreated." ";
         //echo "smsMessageSid:".$smsmessage->smsMessageSid." ";
         //下面可以自己添加成功处理逻辑
         return true;
     }
 }

//$code = rand(1000,9999);

//echo 123;

$phone = $_GET['phone'];
//var_dump($_GET);
//echo $phone;

$res = sendTemplateSMS($phone,array($code,1),'1');
if( $res ){
	echo 1;
}else{
	echo 0;
}



?>