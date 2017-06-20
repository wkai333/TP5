<?php

namespace app\api\controller;

use \think\Session;
use \think\Request;

class Index extends \think\controller{
	
	public function api(){
		//echo 'hello,API';
		//$this->fetch();
		//$view = new view();
		//defined('SMS_SEND') or define('SMS_SEND','./send.php');
		//echo SMS_SEND;die;
		$this->assign('addr','./check');
		return  $this->fetch();
	}

	public function testRequest(){
		$url = 'https://www.baidu.com';
		$content = request($url);
		dump($content);
		//$rs = file_get_contents($content);

	}

	public function login(){
		$this->display();
	}

	public function check(){
		//$user_code = $_POST['code'];
		$user_code = Request::instance()->post('code');
		//session_start();
		//$sess_code = $_SESSION['code'];
		$sess_code = Session::get('code');
		if( $user_code == $sess_code ){
			echo 'OK';
			//echo 'user_code:'.$user_code;
			//echo 'sess_code'.$sess_code;
		}else{
			//echo 'user_code:'.$user_code;
			//echo 'sess_code'.$sess_code;
			echo 'error';
		}
	}

}

?>