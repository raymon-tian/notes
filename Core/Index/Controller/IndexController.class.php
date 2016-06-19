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
	//文章查询
	public function result(){
		$words = I('post.');
		$keywords = $words['keywords'];
		$uid = $_SESSION[C('USER_AUTH_KEY')];
		$sql = "select note.id id,c_id,title,content,publish_time,category.name c_name from note,category where note.c_id=category.id  and note.u_id=$uid and category.u_id=$uid and (title like '%$keywords%' or content like '%$keywords%') order by publish_time desc";
		$notes = M()->query($sql);
		$this->notes = $notes;
		$this->display();
	}
}
