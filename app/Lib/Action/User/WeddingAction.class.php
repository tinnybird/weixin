<?php
class WeddingAction extends UserAction{
	public $token;
	public $wedding_model;
	public $wedding_info_model;
	public $wedding_photo_model;	
	public function _initialize() {
		parent::_initialize();
		$token_open=M('token_open')->field('queryname')->where(array('token'=>session('token')))->find();
		if(!strpos($token_open['queryname'],'wedding')){
            $this->error('您还开启该模块的使用权,请到功能模块中添加',U('Function/index',array('token'=>session('token'),'id'=>session('wxid'))));
		}
		$this->wedding_model=M('Wedding');
		$this->wedding_info_model=M('Wedding_info');
		$this->wedding_photo_model=M('Wedding_photo');
		$this->token=session('token');
		$this->assign('token',$this->token);
	}
	
	public function index(){
		$list=$this->wedding_model->where(array('token'=>$this->token))->select();
		$this->assign('list',$list);
		$this->display();
	
	}
	
	public function add(){
		if(IS_POST){
			$_POST['statdate']=strtotime($_POST['statdate']);
			$_POST['token']=$this->token;
			if($this->wedding_model->create()!=false){				
				if($id=$this->wedding_model->add()){
					$data1['pid']=$id;
					$data1['module']='Wedding';
					$data1['token']=$this->token;
					$data1['keyword']=$_POST['keyword'];
					M('Keyword')->add($data1);
					$this->success('喜帖创建成功',U('Wedding/index'));
				}else{
					$this->error('服务器繁忙,请稍候再试');
				}
			}else{
				$this->error($this->wedding_model->getError());
			}
			
			
		}else{
			$this->display('set');
		}
	}

	public function edit(){
		if(IS_POST){
			$_POST['id']=$this->_get('id');
			$_POST['token']=$this->token;
			$where=array('id'=>$_POST['id'],'token'=>$_POST['token']);
			$_POST['statdate']=strtotime($_POST['statdate']);		
			$check=$this->wedding_model->where($where)->find();
			if($check==false)$this->error('非法操作');
			if($this->wedding_model->create()){	
				if($id=$this->wedding_model->where($where)->save($_POST)){
					$data1['pid']=$_POST['id'];
					$data1['module']='Wedding';
					$data1['token']=$this->token;
					$da['keyword']=$_POST['keyword'];
					M('Keyword')->where($data1)->save($da);
					$this->success('修改成功');
				}else{
					$this->error('操作失败');
				}
			}else{
				$this->error($this->wedding_model->getError());
			}
			
		}else{
			$id=$this->_get('id');
			$where=array('id'=>$id,'token'=>$this->token);
			$check=$this->wedding_model->where($where)->find();
			if($check==false)$this->error('非法操作');
			$wedding=$this->wedding_model->where($where)->find();		
			$this->assign('wedding',$wedding);
			$this->display('set');
		}
	
	}
	
	public function info(){
		$where['token']=$this->token;
		$where['pid']=$this->_get('id');
		$where['type']='1';
		$count=$this->wedding_info_model->where($where)->count();
		$page=new Page($count,12);
		$info=$this->wedding_info_model->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//var_dump($info);
		$this->assign('page',$page->show());
		$this->assign('info',$info);
		$this->display();

	}

	public function comment(){
		$where['token']=$this->token;
		$where['pid']=$this->_get('id');
		$where['type']='2';
		$count=$this->wedding_info_model->where($where)->count();
		$page=new Page($count,12);
		$info=$this->wedding_info_model->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//var_dump($info);
		$this->assign('page',$page->show());
		$this->assign('info',$info);
		$this->display();

	}

	public function photo(){
		
		$checkdata=$this->wedding_model->where(array('token'=>$this->token,'id'=>$this->_get('id')))->find();
		if($checkdata==false){$this->error('喜帖不存在');}
		if(IS_POST){
			$this->all_insert('Wedding_photo');			
		}else{
			$count      = $this->wedding_photo_model->where(array('token'=>$this->token,'pid'=>$this->_get('id')))->count();
			$Page       = new Page($count,12);
			$show       = $Page->show();
			$list = $this->wedding_photo_model->where(array('token'=>$this->token,'pid'=>$this->_get('id')))->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
			$this->assign('page',$show);		
			$this->assign('photo',$list);
			$this->display();	
		
		}
		
	}
	
	public function photo_edit(){
		if($this->_get('token')!=$this->token){$this->error('非法操作');}
		$check=$this->wedding_photo_model->field('id,pid')->where(array('token'=>$this->token,'id'=>$this->_post('id')))->find();
		if($check==false){$this->error('照片不存在');}
		if(IS_POST){
			$this->all_save('Wedding_photo');		
		}else{
			$this->error('非法操作');
		}
	}

	public function photo_del(){
		if($this->_get('token')!=$this->token){$this->error('非法操作');}
		$check=$this->wedding_photo_model->field('id,pid')->where(array('token'=>$this->token,'id'=>$this->_get('id')))->find();
		if($check==false){$this->error('服务器繁忙');}
		if(empty($_POST['edit'])){
			if($this->wedding_photo_model->where(array('id'=>$check['id']))->delete()){
				$this->success('操作成功');
			}else{
				$this->error('服务器繁忙,请稍后再试');
			}
		}
	}

	public function info_del(){
		if($this->_get('token')!=$this->token){$this->error('非法操作');}
		$check=$this->wedding_info_model->field('id,pid')->where(array('token'=>$this->token,'id'=>$this->_get('id'),'type'=>1))->find();
		if($check==false){$this->error('服务器繁忙');}
		if(empty($_POST['edit'])){
			if($this->wedding_info_model->where(array('id'=>$check['id']))->delete()){
				$this->success('操作成功');
			}else{
				$this->error('服务器繁忙,请稍后再试');
			}
		}
	}

	public function comment_del(){
		if($this->_get('token')!=$this->token){$this->error('非法操作');}
		$check=$this->wedding_info_model->field('id,pid')->where(array('token'=>$this->token,'id'=>$this->_get('id'),'type'=>2))->find();
		if($check==false){$this->error('服务器繁忙');}
		if(empty($_POST['edit'])){
			if($this->wedding_info_model->where(array('id'=>$check['id']))->delete()){
				$this->success('操作成功');
			}else{
				$this->error('服务器繁忙,请稍后再试');
			}
		}
	}
					
	public function del(){
		$where['id']=$this->_get('id','intval');
		//$where['uid']=session('uid');
		if($this->wedding_model->where($where)->delete()){
			$this->success('操作成功',U(MODULE_NAME.'/index'));
		}else{
			$this->error('操作失败',U(MODULE_NAME.'/index'));
		}
	}
	
}



?>