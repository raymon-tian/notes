<?php

namespace Index\Controller;

use Think\Controller;

class LoginController extends Controller {
	
	public function index() {
		$this->display();
	}

	public function login() {
		if (!IS_POST)
			E('页面不存在'); 

		$username = I('username');
		$pwd = I('password', '', 'md5');
		$code = I('code'); 
		//检验验证码
		$verfity = $this->check_verify($code, '');
		if (!$verfity) {
			$this->error('验证码错误');
		} 
		
		//检测用户名和密码
		$user = M('user')->where(array('name' => $username))->find();
		//$user = mysql_query("select * from user");dump($user);die;
		 if (!$user || $user['password'] != $pwd) {
		 	$this->error('用户名或密码错误');
		 }
		  
		session(C('USER_AUTH_KEY'), $user['id']);
		session('username', $user['name']);

		$this->redirect('Index/Index/index');
	} 

	public function verify() {
		$config = array('fontSize' => 20, 
			'length' => 4, 
			'useNoise' => false, 
			);
		ob_clean();ob_clean();
		$Verify = new \Think\Verify($config);
		$Verify->codeSet = '0123456789';
		$Verify->entry();
	} 
	
	function check_verify($code, $id = '') {
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	function register(){
		$username = I('username');
		$pwd = I('password', '', 'md5');
		$data['name'] = $username;
		$data['password'] = $pwd;
		$result = M('user')->add($data);
		if($result){
			$this->success('注册成功',U('Index/Login/index'));
		}else{
			$this->error("注册失败");
		}
	}
}

?>
