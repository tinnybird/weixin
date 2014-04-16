<?php
class UsersAction extends BackAction{
	public function index(){
		$db=D('Users');
		$group=M('User_group')->field('id,name')->order('id desc')->select();
		$count= $db->count();
		$Page= new Page($count,25);
		$show= $Page->show();
		$list = $db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($group as $key=>$val){
			$g[$val['id']]=$val['name'];
		}
		unset($group);
		$this->assign('info',$list);
		$this->assign('page',$show);
		$this->assign('group',$g);
		$this->display();
	}
	
	// 添加用户
    public function add(){
        $UserDB = D("Users");
        if(isset($_POST['dosubmit'])) {
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            if(empty($password) || empty($repassword)){
                $this->error('密码必须填写！');
            }
            if($password != $repassword){
                $this->error('两次输入密码不一致！');
            }
            //根据表单提交的POST数据创建数据对象
            $_POST['viptime']=strtotime($_POST['viptime']);
            if($UserDB->create()){
                $user_id = $UserDB->add();
                if($user_id){
					$this->success('添加成功！',U('Admin/Users/index'));                    
                }else{
                     $this->error('添加失败!');
                }
            }else{
                $this->error($UserDB->getError());
            }
        }else{
            $role = M('User_group')->field('id,name')->where('status = 1')->select();
            $this->assign('role',$role);
            $this->assign('tpltitle','添加');
            $this->display();
        }
    }
	public function search(){
		$name=$this->_post('name');
		$type=$this->_post('type');
		switch($type){
			case 1:
			$data['username']=$name;
			break;
			case 2:
			$data['id']=$name;
			break;
			case 3:
			$data['email']=$name;
		}
		//dump($where);
		$list=M('Users')->where($data)->select();
		$this->assign('info',$list);
		$this->display('index');
	
	}
    // 编辑用户
    public function edit(){
         $UserDB = D("Users");
        if(isset($_POST['dosubmit'])) {
            $password = $this->_post('password','trim',0);
            $repassword = $this->_post('repassword','trim',0);
			$users=M('Users')->field('gid')->find($_POST['id']);
            if($password != $repassword){
                $this->error('两次输入密码不一致！');
            }
            if($password==false){ 
				unset($_POST['password']);
				unset($_POST['repassword']);
			}else{
				$_POST['password']=md5($password);
			}
			unset($_POST['dosubmit']);
			unset($_POST['__hash__']);
            //根据表单提交的POST数据创建数据对象
            $_POST['viptime']=strtotime($_POST['viptime']);
                if($UserDB->save($_POST)){
					if($_POST['gid']!=$users['gid']){
						$fun=M('Function')->field('funname,gid,isserve')->where('`gid` <= '.$_POST['gid'])->select();
						foreach($fun as $key=>$vo){
							$queryname.=$vo['funname'].',';
						}
						$open['queryname']=rtrim($queryname,',');
						$uid['uid']=$_POST['id'];
						$token=M('Wxuser')->field('token')->where($uid)->select();
						if($token){
							$token_db=M('Token_open');
							foreach($token as $key=>$val){
								$wh['token']=$val['token'];
								$token_db->where($wh)->save($open);
							}
						}
					}
                    $this->success('编辑成功！',U('Admin/Users/index'));
                }else{
                     $this->error('编辑失败!');
                }
            
        }else{
            $id = $this->_get('id','intval',0);
            if(!$id)$this->error('参数错误!');
            $role = M('User_group')->field('id,name')->where('status = 1')->select();
            $info = $UserDB->find($id);
            $this->assign('tpltitle','编辑');
            $this->assign('role',$role);
            $this->assign('info',$info);
            $this->display('add');
        }
    }

    //修改用户定制菜单
    public function editMenu(){
    	$UserMenu = M('User_menu');
    	if(isset($_POST['dosubmit'])){
    		$userid = intval($_POST['uid']);
    		$gid = intval($_POST['gid']);

	    	if(!$userid && !$gid){
	    		$this->error('参数错误!');
	    	}
	    	$data = array();
	    	foreach ($_POST as $k => $v) {
				$tmp_arr = explode('|', $k);
				if(count($tmp_arr) == 3 && $tmp_arr[0] == 'menukey'){
					$data[$tmp_arr[1]][$tmp_arr[2]] = $_POST['menuval|'.$tmp_arr[1].'|'.$tmp_arr[2]];
				}
	    	}

	    	if(!$gid){
	    		$user = M('Users')->field('id,gid,username')->where('id = '.$userid)->find();
            	$gid = $user['gid'];
	    	}
            if($gid<5){	//普通用户写配置文件
            	$re = F('usermenu_'.$gid, $data, CONF_PATH.'/User/');
            	if($re){
		    		$this->success('更新成功');
		    	}else{
		    		$this->error('更新错误!');
		    	}
		    	return;
            }

	    	$re_data = array(
	    		'userid' => $userid,
	    		'menu' => json_encode($data)
	    	);
	    	if($_POST['id']){
	    		$re_data['id'] = intval($_POST['id']);
	    		$re = $UserMenu->save($re_data);
		    	if($re){
		    		$this->success('更新成功');
		    	}else{
		    		$this->error('更新错误!');
		    	}
		    	return;
	    	}
	    	$re = $UserMenu->add($re_data);
	    	if($re){
	    		$this->success('添加成功');
	    	}else{
	    		$this->error('添加错误!');
	    	}
    	}else{
    		$id = $this->_get('id','intval',0);
    		$gid = $this->_get('gid','intval',0);
            if(!$id && !$gid)$this->error('参数错误!');
            
            $Menu = F('usermenu','',CONF_PATH.'/User/');
            
            if($id){
            	$user = M('Users')->field('id,gid,username')->where('id = '.$id)->find();
            	$gid = $user['gid'];
            }else{
            	$user['gid'] = $gid;
            }
            
            $mid = 0;
            if($gid < 5){	//普通用户取配置文件
            	$info = F('usermenu_'.$gid,'',CONF_PATH.'/User/');
            }else{
            	$info = $UserMenu->where('userid='.$id)->find();
	            if($info){
	            	$mid = $info['id'];
	            	$info = json_decode($info['menu'],true);
	            }
            }

            $html='';
	    	foreach ($Menu as $k1 => $v1) {
	    		$html .= '<tr><td></td><td>'.$v1['text'].'</td><td>'.$k1.'</td><td></td></tr>';
	    		foreach ($v1['data'] as $k2 => $v2) {
	    			if(isset($info[$k1][$k2])){
	    				$check = 'checked="checked"';
	    			}else{
	    				$check = '';
	    			}
	    			$html .= '<tr><td style="text-align:center;"><input name="menukey|'.$k1.'|'.$k2.'" type="checkbox" '.$check.'></td><td>&nbsp;&nbsp;&nbsp;├─ '.$v2['text'].'</td><td>'.$k2.'</td><td><input name="menuval|'.$k1.'|'.$k2.'" type="text"></td></tr>';
	    		}
	    	}

	    	$this->assign('tpltitle','用户菜单权限编辑');
            $this->assign('html',$html);
            $this->assign('user',$user);
            $this->assign('mid',$mid);
            $this->display('editMenu');
    	}
    }
	
	public function addfc(){
		$token_open=M('Token_open');
		$open['uid']=session('uid');
		$open['token']=$_POST['token'];
		$gid=session('gid');
		$fun=M('Function')->field('funname,gid,isserve')->where('`status`=1 and `gid` <= '.$gid)->select();
		foreach($fun as $key=>$vo){
			$queryname.=$vo['funname'].',';
		}
		$open['queryname']=rtrim($queryname,',');
		$token_open->data($open)->add();
	}
	
	//删除用户
    public function del(){
        $id = $this->_get('id','intval',0);
        if(!$id)$this->error('参数错误!');
        $UserDB = D('Users');
        if($UserDB->delete($id)){
			$where['uid']=$id;
			M('wxuser')->where($where)->delete();
			M('token_open')->where($where)->delete();
			M('text')->where($where)->delete();
			M('img')->where($where)->delete();
			M('member')->where($where)->delete();
			M('indent')->where($where)->delete();
			M('areply')->where($where)->delete();
			$this->assign("jumpUrl");
			$this->success('删除成功！');            
        }else{
            $this->error('删除失败!');
        }
    }
}