<?php
class WeddingModel extends Model{
	protected $_validate = array(
			array('title','require','喜帖标题不能为空',1),
			array('keyword','require','关键词不能空',1),
			array('coverurl','require','喜帖封面图片必须填写',1),
			array('openpic','require','开场动画图片必须填写',1),
			array('picurl','require','缩略图图片必须填写',1),
			array('man','require','新郎名字不能为空',1),
			array('woman','require','新娘名字不能为空',1),
			array('telphone','require','联系电话不能为空',1),
			array('statdate','require','婚宴日期必须填写',1),
			array('address','require','宴席地址不能为空',1),
			array('password','require','密码必须填写',1),
			array('id','checkid','非法操作',2,'callback',2),

	 );
	protected $_auto = array (		
		array('token','getToken',Model:: MODEL_BOTH,'callback'),
		array('create_time','time',self::MODEL_INSERT,'function'),
	);
	function checkid(){
		$dataid=$this->field('id')->where(array('id'=>$_POST['id'],'token'=>session('token')))->find();
		if($dataid==false){
			return false;
		}else{
			return true;
		}
	}
	function getToken(){	
		return $_SESSION['token'];
	}
}

?>
