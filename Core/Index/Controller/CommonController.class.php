<?php

/**
 * Description of CommenController
 * 
 * @author <dongtian@nuaa.edu.cn> 
 */

namespace Index\Controller;

use Think\Controller;
use Org\Util\Rbac;

class CommonController extends Controller {
	/**
	 * 基础验证登陆
	 */
	public function _initialize() {
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->redirect('Index/Login/index');
		}
		$uid = $_SESSION[C('USER_AUTH_KEY')];
		$GLOBALS['uid'] = $uid; 
	}
}

?>
