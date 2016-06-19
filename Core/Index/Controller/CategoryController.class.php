<?php
	namespace Index\Controller;
	use Think\Controller;
	/**
	 * @author dongtian <dongtian@nuaa.edu.cn>
	 * 笔记类别控制器
	 */

	class CategoryController extends CommonController {
		/**
		 * 种类列表显示
		 */
		public function listView (){
			$this->title = '笔记类别列表';
			$uid = $GLOBALS['uid'];
			$where['u_id'] = $uid;
			$category_model = M('category');
			$p = I('get.p',1,'intval');
			$count = $category_model->count();
			$list = $category_model->page($p . ',8')->where($where)->select();
			$Page = new \Think\Page($count,8);//实例化分页类
			$Page->setConfig('header','个类别');
			$Page->setConfig('prev','上一页');
			$Page->setConfig('next','下一页');
			$Page->setConfig('first','第一页');
			$Page->setConfig('last','最后页');
			$page = $Page->show();
			$this->categories = $list;
			$this->page = $page;
 			$this->display();
		}
		/**
		 * 笔记类别详情
		 */
		public function view (){
			$uid = $GLOBALS['uid'];
			$id = I('get.id','','intval');
			$sql = "select id,title,publish_time from note where c_id=$id and u_id=$uid";
			$result = M()->query($sql);
			if($result){
				$this->notes = $result;
				$this->display();
			}else{
				$this->error('该类别下不存在笔记');
			}
		}
		/**
		 * 添加视图
		 */
		public function add (){
			$this->title = '添加笔记类别';
			$this->display();
		}

		/**
		 * 执行添加
		 */
		public function addDo (){
			$data = I('post.');
			$uid = $GLOBALS['uid'];
			$data['u_id'] = $uid;
			$result = M('category')->add($data);
			if($result){
				$this->success('添加成功',U('Index/category/listView'));
			}else{
				$this->error('添加失败');
			}
		}

		/**
		 * 编辑视图
		 */
		public function edit (){
			$this->title = '笔记类别编辑';
			$id = I('get.id','','intval');
			$map['id'] = $id;
			$result = M('category')->where($map)->find();
			if($result){
				$this->category = $result;
				$this->display();
			}else{
				$this->error('该笔记类别不存在');
			}
		}

		/**
		 * 执行编辑
		 */
		public function editDo (){
			$data = I('post.');
			$data['u_id'] = $GLOBALS['uid'];
			$result = M('category')->save($data);
			if($result){
				$this->success('修改成功',U('Index/Category/listView'));
			}else{
				$this->error('修改失败');
			}
		}

		/**
		 * 删除，同时删除该笔记类别下的所有笔记记录
		 */
		
		public function delete (){
			$id = I('get.id','','intval');
			$c_id = $id;
			$u_id = $GLOBALS['uid'];
			$file_names = M()->query("select location from appendix,note where appendix.n_id=note.id and u_id=$u_id and c_id=$c_id");
			for($i=0;$i<count($file_names);++$i){
				$file_name = "./Public/Appendix/" . $file_names[$i]['location'];
				unlink($file_name);
			}
			$result = M()->execute("delete from category where id=$id and u_id=$u_id");
			if($result){
				$this->success('删除成功',U('Index/Category/listView'));
			} else{
				$this->error('删除失败');
			}
		}
	}
?>