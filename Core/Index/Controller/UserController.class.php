<?php

namespace Index\Controller;

use Think\Controller;


class UserController extends CommonController {
	
	public function view(){
		$uid = $GLOBALS['uid'];
		$user = M()->query("select * from user where id=$uid");
		$this->user = $user[0];
		$this->display();
	}

	public function editDo(){
		$uid = $GLOBALS['uid'];
		$pw = M()->query("select password from user where id=$uid");
		$pw = $pw[0]['password'];

		$data = I();
		$data['id'] = $uid;
		$data['password'] = md5($data['password']);
		if($data['password'] !== $pw){
			$this->error("原密码错误");
		}
		$data['password'] = md5($data['n_password']);
		$result = M('user')->save($data);
		if($result){
			session_unset();
			session_destroy();
			$this->success('修改成功',U('Index/Login/index'));
		}else{
			$this->error("修改失败");
		}
	}
}

?>
