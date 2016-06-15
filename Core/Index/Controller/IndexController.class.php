<?php 
// 本类由系统自动生成，仅供测试用途
namespace Index\Controller;

use Think\Controller;

class IndexController extends CommonController {
	public function index() {
		$this->title = "首页";
		$this->display();
	} 
	// 退出登录，删除session
	public function logout() {
		session_unset();
		session_destroy();
		$this->redirect('Index/Login/index');
	}
}
