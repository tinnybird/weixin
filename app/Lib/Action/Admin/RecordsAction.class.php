<?php
class RecordsAction extends BackAction{
	public function index(){
		$records=M('indent');
		//$db=M('Users');
		$count=$records->count();
		$page=new Page($count,25);
		$show= $page->show();
		$info=$records->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}
	public function send(){
		$money=$this->_get('price','intval');
		$data['id']=$this->_get('uid','intval');
	//	dump($money);exit;
		if($money!=false&&$data['id']!=false){
			//dump($money);exit;
			$indent = M('Indent')->field('id,widtrade_no,indent_id')->where(array('id'=>$this->_get('iid','intval')))->find();
			if(!$indent){
				$this->error('订单不存在');
			}
			$back=M('Users')->where($data)->setInc('money',$money);
			//$status=M('Indent')->where(array('id'=>$this->_get('iid','intval')))->setField('status',2);
			if($back!=false){
				//调用发货流程
				echo '充值成功，同步数据到阿里..';
				redirect(U('User/Alipay/send',array('WIDtrade_no'=>$indent['widtrade_no'],'id'=>$indent['id'],'callback_url'=>'Admin/Records/index')));
				exit();
				$this->success('充值成功');
			}else{
				$this->error('充值失败');
			}
		}else{
			$this->error('非法操作');
		}
	}
}