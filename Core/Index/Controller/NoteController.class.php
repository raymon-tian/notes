<?php
	namespace Index\Controller;
	use Think\Controller;

	/**
	 * 笔记控制器
	 * @author dongtian <dongtian@nuaa.edu.cn>
	 */
	class NoteController extends CommonController {

		
		/**
		 *笔记列表展示
		 */
		public function listView(){
			$uid = $_SESSION[C('USER_AUTH_KEY')];
			$note_model = M();
			$p = I('get.p',1,'intval');//笔记页码参数
			$count = $note_model->query('select count(*) count from note');
			$count = intval($count[0]['count']);
			$sql = "select note.id id,c_id,title,content,publish_time,category.name c_name from note,category where note.c_id=category.id  and note.u_id=$uid";
			$notes = $note_model->page($p.',8')->query($sql);
			$Page = new \Think\Page($count,8);
			$Page->setConfig('header','片笔记');
			$Page->setConfig('prev','上一页');
			$Page->setConfig('next','下一页');
			$Page->setConfig('first','第一页');
			$Page->setConfig('last','最后页');
			$page = $Page->show();
			$this->title = '笔记列表';
			// $this->page = $page;
			$this->notes = $notes;
			$this->display();
		}

		/**
		 * 笔记详情显示
		 */
		public function view(){
			$this->title = '笔记详情';
			$uid = $GLOBALS['uid'];
			$id = I('get.id','','intval');
			$sql = "select note.id id,c_id,title,content,publish_time,category.name c_name from note,category where note.c_id=category.id  and  note.id = $id";
			$this->note = M()->query($sql);
			$note = $this->note[0];
			$note['content'] = htmlspecialchars_decode(stripslashes($note['content']));
			$this->appendixes = M()->query("select name,location from appendix where n_id=$id");
			//dump($this->appendixes);die;
			$this->note = $note;
			$this->display();
		}

		/**
		 * 添加笔记
		 */
		public function add(){
			$uid = $GLOBALS['uid'];
			$this->title = '添加笔记';
			$this->types_note = M()->query("select id,name from category where u_id=$uid");
			$this->display();
		}

		/**
		 * 执行添加
		 */
		public function addDo(){
			$flag;//是否进行了文件上传
			$num;//上传文件的总数
			$note_model = M('note');
			$data = I('post.');//要写入到notes表中的数据结构
			if(!$data['c_id'])	$this->error("无笔记类别");
			$data['publish_time'] = date('Y-m-d H:i:s');
			$data['u_id'] = $_SESSION[C('USER_AUTH_KEY')];
			
			if($_FILES['fileurl']['name'][0] === ""){
				$flag = 0;
			}else{
				$flag = 1;
			}
			$num = count($_FILES['fileurl']['name']);
			if($flag){
				$result = $note_model->add($data);
				if(!$result){
	 				$this->error("添加失败");
	 			}
				$config = array(
					'maxSize' => 0,
					'rootPath' => './Public/Appendix/',
					'exts' => array('doc', 'docx', 'pdf', 'txt','rar','zip'),
					'subName' => array('date', 'Ymd'),
				);
				$upload = new \Think\Upload($config); // 实例化上传类
				$info = $upload->upload(array($_FILES['fileurl']));
				if(!$info){
					$this->error($upload->getError());
				}else{
					//多文件上传
					$app = array();
					for($i=0;$i<$num;++$i){
						$app['u_id'] = $data['u_id'];
						$app['n_id'] = intval($result);
						$app['name'] = $_FILES['fileurl']['name'][$i];
						$fileurl = $info[$i]['savepath'] . $info[$i]['savename'];
						$app['location'] = $fileurl;
						$result2 = M('appendix')->add($app);
						if(!$result){
	 						$this->error("笔记添加成功，附件添加失败");
	 					}
					}
					$this->success("添加成功", U('Index/Note/listView'));
				}
			}else{
				//没有进行文件上传
				$result = $note_model->add($data);
				if($result){
	 				$this->success("添加成功", U('Index/Note/listView'));
	 			}else{
	 				$this->error("添加失败");
	 			}
 			}
		}


		/**
		 * 编辑笔记视图
		 */
		public function edit(){
			$this->title = '编辑笔记';
			$id = I('get.id','','intval');//笔记的id
			$uid = $GLOBALS['uid'];
			$result = M()->query("select * from note where id=$id");
			$result = $result[0];
			if(!$result){
				$this->error('您要编辑的笔记不存在');
			}else{
				$this->categories = M()->query("select * from category where u_id=$uid");
				$result['content'] = htmlspecialchars_decode(stripslashes($result['content']));
				$this->appendixes = M()->query("select id,name,location from appendix where n_id=$id");
				//dump($this->appendixes);die;
				$this->note = $result;
				$this->display();
			}
		}

		/**
		 * 执行添加
		 */
		public function editDo(){
			$flag;//是否进行了文件上传
			$num;//上传文件的总数
			$note_model = M('note');
			$data = I('post.');//要写入到notes表中的数据结构
			
			if($_FILES['fileurl']['name'][0] === ""){
				$flag = 0;
			}else{
				$flag = 1;
			}
			$num = count($_FILES['fileurl']['name']);
			if($flag){
				$result = $note_model->save($data);
				if(!$result){
	 				$this->error("修改失败");
	 			}
				$config = array(
					'maxSize' => 0,
					'rootPath' => './Public/Appendix/',
					'exts' => array('doc', 'docx', 'pdf', 'txt','rar','zip'),
					'subName' => array('date', 'Ymd'),
				);
				$upload = new \Think\Upload($config); // 实例化上传类
				$info = $upload->upload(array($_FILES['fileurl']));
				if(!$info){
					$this->error($upload->getError());
				}else{
					//多文件上传
					$app = array();
					for($i=0;$i<$num;++$i){
						$app['n_id'] = $data['id'];
						$app['name'] = $_FILES['fileurl']['name'][$i];
						$fileurl = $info[$i]['savepath'] . $info[$i]['savename'];
						$app['location'] = $fileurl;
						$result2 = M('appendix')->add($app);
						if(!$result){
	 						$this->error("笔记修改成功，附件添加失败");
	 					}
					}
					$this->success("修改成功", U('Index/Note/listView'));
				}
			}else{
				//没有进行文件上传
				$result = $note_model->save($data);
				if($result){
	 				$this->success("修改成功", U('Index/Note/listView'));
	 			}else{
	 				$this->error("修改失败");
	 			}
 			}
		}

		//响应客户端ajax请求
		public function deleteAppendix(){
			$a_id = I('post.a_id','','intval');
			$n_id = I('post.n_id','','intval');
			$u_id = $GLOBALS['uid'];
			$appendix = M()->query("select * from appendix where id=$a_id and u_id=$u_id");
			M()->execute("delete from appendix where id=$a_id");
			$file_name = "./Public/Appendix/" . $appendix[0]['location'];
			unlink($file_name);
			$result = M()->query("select * from appendix where n_id=$n_id and u_id=$u_id");
			$this->ajaxReturn($result);
		}
		/**
		 * 删除笔记
		 */
		public function delete(){
			$id = I('get.id','','intval');
			$uid = $GLOBALS['uid'];
			$map['id'] = $id;
			$file_names = M()->query("select location from appendix where n_id=$id and u_id=$uid");
			for($i=0;$i<count($file_names);++$i){
				$file_name = "./Public/Appendix/" . $file_names[$i]['location'];
				unlink($file_name);
			}
			$result = M('note')->where($map)->delete();
			if($result){
				$this->success('删除成功',U('Index/Note/listView'));
			}else{
				$this->error('删除失败');
			}
		}
	}

?>