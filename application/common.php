<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//对接口请求的的方法进行封装
/******************
*
***@$url 请求的地址
***@$https 确保 https 类型可以请求成功
***@$method 请求的方式
***@$data 请求的参数
***@return 返回请求的数据
******************/

function request($url,$https=true,$method='get',$data=null){

	//1、初始化 curl 函数
	$ch = curl_init($url);
	//2、设置相关参数
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//判断是否为 https 请求
	if( $https === true ){
		//设置参数确保 https 方式能够请求成功
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	}
		//判断数据请求的方式
	if( $method == 'post' ){
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	//3、发送请求
	$return = curl_exec($ch);
	//4、关闭链接，返回数据
	curl_close($ch);
	return $return;
}


