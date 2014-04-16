<?php
class EditsmsAction extends UserAction{
	//短信设置
	public function index(){
		$where['uid']=session('uid');
		if(!$where['uid']){
			$this->error('登录错误');
		}
		$res=M('Wxuser_setting')->field('sms')->where($where)->find();

		if($res['sms']){
			$info = json_decode($res['sms'], true);
			$this->assign('info', $info);
		}
		$this->display('Index:editsms');
	}

	public function upsave(){
		$uid = session('uid');
		$data = array();
		$data['u'] = addslashes($_POST['u']);
		$data['p'] = addslashes($_POST['p']);
		$data['t'] = addslashes($_POST['t']);
		$data['s'] = intval($_POST['s']);

		if($_POST['is_test']){
			$smsrs = file_get_contents('http://api.smsbao.com/sms?u='.$data['u'].'&p='.md5($data['p']).'&m='.$data['t'].'&c='.urlencode('测试信息'));
			if(strpos($smsrs, '0') === 0){
				$this->success($smsrs);
			}else{
				$this->error($smsrs);
			}
			exit();
		}

		$User = M('Wxuser_setting');
		$info = $User->where('uid='.$uid)->find();
		$re_data = array(
			'sms' => json_encode($data)
		);

		$userinfo = M('Wxuser')->field('token')->where('uid='.$uid)->find();

		$re_data['token'] = $userinfo['token'];

		if($info){
			$re_data['id'] = $info['id'];
			$re = $User->save($re_data);
		}else{
			$re_data['uid'] = $uid;
			$re = $User->add($re_data);
		}

		if($re){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
		
	}
}
?>