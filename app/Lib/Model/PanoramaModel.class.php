<?php
class WeddingModel extends Model{
	protected $_validate = array(
			array('name','require','名称不能为空',1),
			array('keyword','require','关键词不能空',1),
			array('frontpic','require','图片必须填写',1),

	 );
	protected $_auto = array (		
		array('token','getToken',Model:: MODEL_BOTH,'callback'),
		array('create_time','time',self::MODEL_INSERT,'function'),
	);
	function getToken(){	
		return $_SESSION['token'];
	}
}

?>
