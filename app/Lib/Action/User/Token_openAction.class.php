<?php
class Token_openAction extends UserAction{

	public function add(){
		$fun=M('Function')->where(array('id'=>$this->_get('id')))->find();
		$openwhere=array('uid'=>session('uid'),'token'=>session('token'));
		//删除掉重复的token
		$deleteWhere=array();
		$deleteWhere['uid']=array('neq',session('uid'));
		$deleteWhere['token']=session('token');
		M('Token_open')->where($deleteWhere)->delete();
		$open=M('Token_open')->where($openwhere)->find();		
		//$str['queryname']=str_replace(',,',',',$open['queryname'].','.$fun['funname']);		
		
		//重新提取合法的功能
		$gid=session('gid');
		$funs=M('Function')->field('funname')->where('`status`=1 and `gid` <= '.$gid)->select();
		$fun_arr = array();
		foreach ($funs as $k => $v) {
			$fun_arr[] = $v['funname'];
		}

		$qn_arr = explode(',', $open['queryname']);
		$qn_arr[] = $fun['funname'];
		//把不合法的全部过滤掉
		foreach ($qn_arr as $k => $v) {
			if(!in_array($v, $fun_arr)){
				unset($qn_arr[$k]);
			}
		}
		$str['queryname'] = implode(',', $qn_arr);


		$back=M('Token_open')->where($openwhere)->save($str);
		if($back){
			echo 1;
		}else{
			echo 2;
		}
	
	}
	public function del(){
		$fun=M('Function')->where(array('id'=>$this->_get('id')))->find();
		$openwhere=array('uid'=>session('uid'),'token'=>session('token'));
		$open=M('Token_open')->where($openwhere)->find();		
		//删除掉重复的token
		$deleteWhere=array();
		$deleteWhere['uid']=array('neq',session('uid'));
		$deleteWhere['token']=session('token');
		M('Token_open')->where($deleteWhere)->delete();
		//$str['queryname']=ltrim(str_replace(',,',',',str_replace($fun['funname'],'',$open['queryname'])),',');	
		//重新提取合法的功能
		$gid=session('gid');
		$funs=M('Function')->field('funname')->where('`status`=1 and `gid` <= '.$gid)->select();
		$fun_arr = array();
		foreach ($funs as $k => $v) {
			$fun_arr[] = $v['funname'];
		}

		$qn_arr = explode(',', $open['queryname']);
		//把不合法的全部过滤掉
		foreach ($qn_arr as $k => $v) {
			if(!in_array($v, $fun_arr) || $v == $fun['funname']){
				unset($qn_arr[$k]);
			}
		}
		$str['id'] = $open['id'];
		$str['uid'] = session('uid');
		$str['queryname'] = implode(',', $qn_arr);
		$back=M('Token_open')->where($openwhere)->save($str);
		if($back){
			echo 1;
		}else{
			echo 2;
		}
	}




}



?>