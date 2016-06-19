<?php
	
namespace Index\Controller;
use Think\Controller;

/**
 * @author dongtian <dongtian@nuaa.edu.cn>
 * 笔记附件管理控制器
 */
 class AppendixController extends CommonController{
 		
 		public function listView(){
 			$this->title = '笔记附件信息列表';
 			$p = I('get.p',1,'intval');
 			$uid = $GLOBALS['uid'];
 			$list = M()->page($p . ',8')->query("select appendix.id id,appendix.name name,location,n_id,title from appendix,note where appendix.n_id=note.id and appendix.u_id=$uid");
 			$count = M()->query("select count(*) count from appendix");
 			$count = intval($count[0]);
 			//实例化分页类
 			$Page = new \Think\Page($count,8);
 			$Page->setConfig('header', '个附件');
			$Page->setConfig('prev', '上一页');
			$Page->setConfig('next', '下一页');
			$Page->setConfig('first', '第一页');
			$Page->setConfig('last', '最后页');
			$show = $Page->show(); // 分页显示输出
			$this->files = $list; // 赋值
			$this->page = $show; // 赋值分页输出
			
			$this->display();
 		}

 		/**
 		 *  删除附件
 		 */
 		public function delete(){
 			$id = I('id','','intval');
 			$uid = $GLOBALS['uid'];
 			$fileurl = M()->query("select location from appendix where id=$id and u_id=$uid");
 			$fileurl = $fileurl[0]['location'];
			if ($fileurl) {
				$file_name = "./Public/Appendix/" . $fileurl;
					unlink($file_name);
			}
 			$result = M()->execute("delete from appendix where id=$id");
 			if($result){
 				$this->success("删除成功", U('Index/Appendix/listView'));
 			}else{
 				$this->error('删除失败');
 			}
 		}	
 } 

?>