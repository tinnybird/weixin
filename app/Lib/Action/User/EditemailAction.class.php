<?php
class EditemailAction extends UserAction{
	//邮箱设置
	public function index(){
		$where['uid']=session('uid');
		if(!$where['uid']){
			$this->error('登录错误');
		}
		$res=M('Wxuser_setting')->field('email')->where($where)->find();
		if($res['email']){
			$this->assign('info',json_decode($res['email'], true));
		}
		$this->display('Index:editemail');
	}

	public function upsave(){
		$uid = session('uid');
		$data = array();
		$data['s'] = intval($_POST['s']);
		$data['uc'] = addslashes($_POST['uc']);	//账户账号
		if($data['uc'] && !$this->isMail($data['uc'])){
			$this->error('请填入正确的邮箱账号');
		}
		$data['un'] = addslashes($_POST['un']);	//账户名
		if(!$data['un']){
			$tmp_arr = explode('@', $data['uc']);
			$data['un'] = $tmp_arr[0];
		}
		$data['pw'] = addslashes($_POST['pw']);	//账号密码
		$data['ur'] = addslashes($_POST['ur']);	//回复账号
		if(!$data['ur']){
			$data['ur'] = $data['uc'];
		}
		if($data['ur'] && !$this->isMail($data['ur'])){
			$this->error('请填入正确的邮箱账号');
		}
		$data['ht'] = addslashes($_POST['ht']);	//host
		$data['pt'] = intval($_POST['pt']);	//port

		if($_POST['is_test']){
			date_default_timezone_set('PRC');
			import('@.ORG.Mail');
	        //require_once '../Wap/class.phpmailer.php';
	        $mail = new PHPMailer();
	        $body = '测试邮件';
	        $mail->IsSMTP();
	        $mail->SMTPDebug = '1';
	        $mail->SMTPAuth = true;
	        //$mail->SMTPSecure = 'tls';
	        $mail->SMTPSecure = 'ssl';
	        $mail->CharSet = 'utf-8';

	        $mail->Host = $data['ht'];
	        $mail->Port = $data['pt'];
	        $mail->Username = $data['uc'];
	        $mail->Password = $data['pw'];
	        $mail->SetFrom($data['uc'], $data['un']);
	        $mail->AddReplyTo($data['ur'], $data['un']);
	        $mail->Subject = '测试邮件';
	        $mail->AltBody = '';
	        $mail->MsgHTML($body);
	        $mail->AddAddress($data['ur'], '商户');
	        $re = $mail->Send();
	        if($re){
				$this->success('操作成功');
			}else{
				$this->error('操作失败');
			}
			exit();
		}

		$User = M('Wxuser_setting');
		$info = $User->where('uid='.$uid)->find();
		$re_data = array(
			'email' => json_encode($data)
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

	public function isMail($Argv){ 
		$RegExp='/^[a-z0-9][a-z\.0-9-_]+@[a-z0-9_-]+(?:\.[a-z]{0,3}\.[a-z]{0,2}|\.[a-z]{0,3}|\.[a-z]{0,2})$/i'; 
		return preg_match($RegExp,$Argv)?$Argv:false; 
	}
}
?>