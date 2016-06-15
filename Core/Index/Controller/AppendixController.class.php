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
 			$list = M()->page($p . ',8')->query("select appendix.id id,appendix.name name,location,n_id,title from appendix,note where appendix.n_id=note.id ");
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
 		 * 添加下载资料信息
 		 */
 		public function add(){
 			$this->title = '添加下载资料信息';
 			$this->types = M('types_file')->select();
 			$this->display();
 		}
 		/**
 		 * 执行添加
 		 */
 		public function addDo(){
 			$file_model = M('files');
 			$data = I('post.');
 			$data['create_time'] = date("Y-m-d H:i:s");
			$data['update_time'] = date("Y-m-d H:i:s");
 			$config = array('maxSize' => 930456592,
			'rootPath' => './Public/Uploads/Files/',
			'exts' => array('doc', 'docx', 'pdf', 'txt','rar','zip'),
			'subName' => array('date', 'Ymd'),
			);
			$upload = new \Think\Upload($config); // 实例化上传类
			$info = $upload->uploadOne($_FILES['fileurl']);
			if (!$info) {
				// 上传错误提示错误信息
				$this->error($upload->getError());
			}else {
				// 上传成功 获取上传文件信息
				$fileurl = $info['savepath'] . $info['savename'];
				$data['fileurl'] = $fileurl;
			}
 			$result = $file_model->add($data);
 			if($result){
 				$this->success("添加成功", U('Index/Appendix/listView'));
 			}else{
 				$this->error('添加失败');
 			}
 		}
 		/**
 		 * 顾客信息修改
 		 * @return [type] [description]
 		 */
 		public function edit(){
 			$this->title = '修改笔记附件信息';
 			$id = I('get.id','','intval');
 			$map['id'] = $id;
 			$this->file = D('FileRelation')->relation('file_type')->where($map)->find();
 			$this->display();
 		}
 		/**
 		 * 执行修改
 		 * @return [type] [description]
 		 */
 		public function editDo(){
 			$id = I('post.id','','intval');
 			$map['id'] = $id;
 			$data = $_POST;
 			$data['update_time'] = date("Y-m-d H:i:s");
 			$file_model = D('FileRelation');
 			$config = array('maxSize' => 3145728,
			'rootPath' => './Public/Uploads/Files/',
			'exts' => array('doc', 'docx', 'pdf', 'txt','rar','zip'),
			'subName' => array('date', 'Ymd'),
			);
			//有文件上传
			if($_FILES['fileurl']['name'] != null)	{

				$upload = new \Think\Upload($config); // 实例化上传类
				$info = $upload->uploadOne($_FILES['fileurl']);
				if (!$info) {
					// 上传错误提示错误信息
					$this->error($upload->getError());
				}else {
					//删除旧的资料
					$fileurl = $file_model->where($map)->getField('fileurl');
					$file_name = "./Public/Uploads/Files/" . $fileurl; 
					unlink($file_name);
					// 上传成功 获取上传文件信息
					$fileurl = $info['savepath'] . $info['savename'];
					$data['fileurl'] = $fileurl;
				}
			}
 			$result = $file_model->save($data);
 			if($result){
 				$this->success("修改成功", U('Index/Appendix/listView'));
 			}else{
 				$this->error('修改失败');
 			}
 		}
 		/**
 		 *  删除附件
 		 */
 		public function delete(){
 			$id = I('id','','intval');
 			$fileurl = M()->query("select location from appendix where id=$id");
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